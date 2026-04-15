<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Book;

class Home extends Component
{
    public function render()
    {
        $latestBooks = Book::latest()->take(6)->get();
        $recommendedBooks = Book::inRandomOrder()->take(4)->get();
        
        // Ambil buku terpopuler berdasarkan jumlah peminjaman
        $popularBooks = Book::withCount('loans')
            ->orderBy('loans_count', 'desc')
            ->take(3)
            ->get();

        // Ambil kategori dari database atau definisikan secara manual untuk tampilan yang lebih bagus
        $categoriesFromDb = Book::whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori');

        $categories = $categoriesFromDb->map(function($item) {
            $slug = strtolower($item);
            $icon = 'other';
            
            if (str_contains($slug, 'fiksi')) $icon = 'fiksi';
            elseif (str_contains($slug, 'didik') || str_contains($slug, 'pelajaran')) $icon = 'pendidikan';
            elseif (str_contains($slug, 'tekno')) $icon = 'teknologi';
            elseif (str_contains($slug, 'bisnis') || str_contains($slug, 'ekonomi')) $icon = 'bisnis';
            elseif (str_contains($slug, 'komik') || str_contains($slug, 'manga')) $icon = 'komik';
            elseif (str_contains($slug, 'religi') || str_contains($slug, 'agama')) $icon = 'religi';

            return (object) [
                'nama' => $item,
                'slug' => $item, // Kita gunakan nama asli untuk filter
                'icon' => $icon,
                'books_count' => Book::where('kategori', $item)->count()
            ];
        });

        return view('livewire.user.home', [
            'latestBooks' => $latestBooks,
            'recommendedBooks' => $recommendedBooks,
            'popularBooks' => $popularBooks,
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}
