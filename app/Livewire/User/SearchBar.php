<?php

namespace App\Livewire\User;

use App\Models\Book;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = [];
            return;
        }

        $this->results = Book::where('judul', 'like', '%' . $this->search . '%')
            ->orWhere('penulis', 'like', '%' . $this->search . '%')
            ->orWhere('kategori', 'like', '%' . $this->search . '%')
            ->limit(5)
            ->get()
            ->toArray();
    }

    public function selectBook($id)
    {
        return redirect()->route('books.show', $id);
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->results = [];
    }

    public function render()
    {
        return view('livewire.user.search-bar');
    }
}
