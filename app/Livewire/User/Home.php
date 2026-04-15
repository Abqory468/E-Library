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

        return view('livewire.user.home', [
            'latestBooks' => $latestBooks,
            'recommendedBooks' => $recommendedBooks,
        ])->layout('layouts.app');
    }
}
