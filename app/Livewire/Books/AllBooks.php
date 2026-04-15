<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Wishlist;
use App\Notifications\BookBorrowed;
use App\Notifications\BookReturned;
use Livewire\WithPagination;

class AllBooks extends Component
{
    use WithPagination;

    public $search = '';
    public $kategori = '';
    public $sort = '';
    public $filter = '';
    
    protected $queryString = [
        'search' => ['except' => ''],
        'kategori' => ['except' => ''],
        'sort' => ['except' => ''],
        'filter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingKategori()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'kategori', 'sort', 'filter']);
        $this->search = '';
        $this->kategori = '';
        $this->sort = '';
        $this->filter = '';
        $this->resetPage();
    }

    public function borrowBook($bookId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $book = Book::findOrFail($bookId);

        if ($book->stok <= 0) {
            session()->flash('error', 'Buku ini sedang tidak tersedia.');
            return;
        }

        // Cek apakah user sudah meminjam buku ini dan belum dikembalikan
        $existingLoan = Loan::where('user_id', auth()->id())
            ->where('book_id', $bookId)
            ->where('status', 'dipinjam')
            ->first();

        if ($existingLoan) {
            session()->flash('error', 'Anda sudah meminjam buku ini.');
            return;
        }

        // Buat peminjaman baru
        Loan::create([
            'user_id' => auth()->id(),
            'book_id' => $bookId,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => 'dipinjam',
        ]);

        // Kurangi stok
        $book->decrement('stok');

        auth()->user()->notify(new BookBorrowed($book));

        session()->flash('message', 'Buku berhasil dipinjam!');
    }

    public function returnBook($bookId)
    {
        $loan = Loan::where('user_id', auth()->id())
            ->where('book_id', $bookId)
            ->where('status', 'dipinjam')
            ->first();

        if ($loan) {
            $loan->update([
                'status' => 'dikembalikan',
                'tanggal_dikembalikan' => now(),
            ]);

            $loan->book->increment('stok');

            auth()->user()->notify(new BookReturned($loan->book));

            session()->flash('message', 'Buku berhasil dikembalikan!');
        }
    }

    public function toggleWishlist($bookId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('book_id', $bookId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'book_id' => $bookId,
            ]);
        }
    }

    public function render()
    {
        $books = Book::query()
            ->withCount('loans')
            ->when($this->search, function ($query) {
                $query->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('penulis', 'like', '%' . $this->search . '%');
            })
            ->when($this->kategori, function ($query) {
                $query->where('kategori', $this->kategori);
            })
            ->when($this->sort === 'latest', function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->when($this->sort === 'popular', function ($query) {
                $query->orderBy('loans_count', 'desc');
            })
            ->when(!$this->sort, function ($query) {
                $query->inRandomOrder();
            })
            ->paginate(12);

        $kategoris = Book::whereNotNull('kategori')->distinct()->pluck('kategori');

        // Ambil ID buku yang sedang dipinjam user untuk status tombol
        $myLoanBookIds = auth()->check() 
            ? Loan::where('user_id', auth()->id())->where('status', 'dipinjam')->pluck('book_id')->toArray()
            : [];

        // Ambil ID buku yang ada di wishlist user
        $myWishlistBookIds = auth()->check()
            ? Wishlist::where('user_id', auth()->id())->pluck('book_id')->toArray()
            : [];

        return view('livewire.books.all-books', [
            'books' => $books,
            'kategoris' => $kategoris,
            'myLoanBookIds' => $myLoanBookIds,
            'myWishlistBookIds' => $myWishlistBookIds,
        ])->layout('layouts.app');
    }
}
