<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Wishlist;
use App\Notifications\BookBorrowed;
use App\Notifications\BookReturned;

class ShowBook extends Component
{
    public Book $book;

    public function mount($id)
    {
        $this->book = Book::findOrFail($id);
    }

    public function borrowBook()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if ($this->book->stok <= 0) {
            session()->flash('error', 'Buku ini sedang tidak tersedia.');
            return;
        }

        $existingLoan = Loan::where('user_id', auth()->id())
            ->where('book_id', $this->book->id)
            ->where('status', 'dipinjam')
            ->first();

        if ($existingLoan) {
            session()->flash('error', 'Anda sudah meminjam buku ini.');
            return;
        }

        Loan::create([
            'user_id' => auth()->id(),
            'book_id' => $this->book->id,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => 'dipinjam',
        ]);

        $this->book->decrement('stok');
        $this->book->refresh();

        auth()->user()->notify(new BookBorrowed($this->book));

        session()->flash('message', 'Buku berhasil dipinjam!');
    }

    public function returnBook()
    {
        $loan = Loan::where('user_id', auth()->id())
            ->where('book_id', $this->book->id)
            ->where('status', 'dipinjam')
            ->first();

        if ($loan) {
            $loan->update([
                'status' => 'dikembalikan',
                'tanggal_dikembalikan' => now(),
            ]);

            $this->book->increment('stok');
            $this->book->refresh();

            auth()->user()->notify(new BookReturned($this->book));

            session()->flash('message', 'Buku berhasil dikembalikan!');
        }
    }

    public function toggleWishlist()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('book_id', $this->book->id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'book_id' => $this->book->id,
            ]);
        }
        $this->book->refresh();
    }

    public function render()
    {
        $isBorrowed = auth()->check() 
            ? Loan::where('user_id', auth()->id())
                ->where('book_id', $this->book->id)
                ->where('status', 'dipinjam')
                ->exists()
            : false;

        $isInWishlist = auth()->check()
            ? Wishlist::where('user_id', auth()->id())
                ->where('book_id', $this->book->id)
                ->exists()
            : false;

        return view('livewire.books.show-book', [
            'isBorrowed' => $isBorrowed,
            'isInWishlist' => $isInWishlist
        ])->layout('layouts.app');
    }
}
