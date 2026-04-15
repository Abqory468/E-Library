<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Book;
use App\Models\Loan;

class Dashboard extends Component
{
    public int $totalBuku = 0;
    public int $totalUser = 0;
    public int $totalPeminjamanAktif = 0;
    public int $totalTerlambat = 0;
    public int $newBooks = 0;
    public int $newUsers = 0;
    public array $monthlyLoans = [];
    public $recentActivities = [];
    public $overdueLoans = [];
    public $newBooksList = [];

    public function mount(): void
    {
        $this->loadData();
    }

    public function loadData(): void
    {
        // Total Buku
        $this->totalBuku = Book::count();
        
        // Total User
        $this->totalUser = User::count();
        
        // Total Peminjaman Aktif
        $this->totalPeminjamanAktif = Loan::where('status', 'dipinjam')->count();
        
        // Total Terlambat
        $this->totalTerlambat = Loan::where('status', 'dipinjam')
            ->where('tanggal_kembali', '<', today())
            ->count();
        
        // Buku baru bulan ini
        $this->newBooks = Book::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        
        // User baru bulan ini
        $this->newUsers = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        
        // Monthly loans untuk chart (12 bulan terakhir)
        $monthlyData = Loan::selectRaw('MONTH(tanggal_pinjam) as month, COUNT(*) as total')
            ->whereYear('tanggal_pinjam', now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
        
        // Isi data untuk 12 bulan (Jan-Dec)
        $this->monthlyLoans = [];
        for ($i = 1; $i <= 12; $i++) {
            $this->monthlyLoans[] = $monthlyData[$i] ?? 0;
        }
        
        // Recent activities (10 aktivitas terbaru)
        $this->recentActivities = Loan::with(['user', 'book'])
            ->latest()
            ->take(10)
            ->get()
            ->map(function($loan) {
                return (object)[
                    'user_name' => $loan->user->name ?? 'Unknown',
                    'book_title' => $loan->book->judul ?? 'Unknown',
                    'type' => $loan->status == 'dipinjam' ? 'borrow' : 'return',
                    'created_at' => $loan->created_at
                ];
            });
        
        // Overdue loans (peminjaman terlambat)
        $this->overdueLoans = Loan::with(['user', 'book'])
            ->where('status', 'dipinjam')
            ->where('tanggal_kembali', '<', today())
            ->get()
            ->map(function($loan) {
                $daysOverdue = today()->diffInDays($loan->tanggal_kembali);
                return (object)[
                    'user_name' => $loan->user->name ?? 'Unknown',
                    'book_title' => $loan->book->judul ?? 'Unknown',
                    'days_overdue' => $daysOverdue
                ];
            });
        
        // New books (5 buku terbaru)
        $this->newBooksList = Book::latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.app', ['title' => 'Dashboard Admin']);
    }
}