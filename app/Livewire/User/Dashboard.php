<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Loan;
use App\Models\Book;

class Dashboard extends Component
{
    public $bukuDipinjam = 0;
    public $totalPeminjaman = 0;
    public $bukuDikembalikan = 0;
    public $bukuTerlambat = 0;
    public $activeLoans;
    public $riwayatPeminjaman;
    public $recommendedBooks;

    public function mount()
    {
        $userId = auth()->id();
        
        // Statistik
        $this->totalPeminjaman = Loan::where('user_id', $userId)->count();
        $this->bukuDipinjam = Loan::where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->count();
        $this->bukuDikembalikan = Loan::where('user_id', $userId)
            ->where('status', 'dikembalikan')
            ->count();
        $this->bukuTerlambat = Loan::where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->where('tanggal_kembali', '<', now())
            ->count();
        
        // Active loans
        $this->activeLoans = Loan::with('book')
            ->where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->orderBy('tanggal_kembali', 'asc')
            ->get();
        
        // Riwayat peminjaman (5 terakhir)
        $this->riwayatPeminjaman = Loan::with('book')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Rekomendasi buku (buku dengan stok > 0, random)
        $this->recommendedBooks = Book::where('stok', '>', 0)
            ->inRandomOrder()
            ->take(5)
            ->get();
    }

    public function borrowBook($bookId)
    {
        // Redirect ke halaman peminjaman dengan book_id terpilih
        return redirect()->route('loans', ['book_id' => $bookId]);
    }

    public function render()
    {
        return view('livewire.user.dashboard')
            ->layout('layouts.app', ['title' => 'Dashboard User']);
    }
}