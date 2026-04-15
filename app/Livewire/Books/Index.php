<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    // Property untuk Search & Filter
    public string $search  = '';
    public string $kategori = '';

    // 🪟 Property untuk Modal (tambah/edit)
    public bool $showModal = false;
    public bool $isEdit    = false;
    public ?int $bookId = null;

    // 📝 Property untuk Form (wire:model)
    public $cover = null;
    public string $title = '';
    public string $penulis = '';
    public ?string $penerbit = '';
    public ?int $tahun_terbit = null;
    public ?string $isbn = '';
    public int $stok = 1;
    public ?string $kategoriInput = '';
    public ?string $deskripsi = '';

    // 🗑️ Property untuk Konfirmasi Hapus
    public bool $showDeleteModal = false;
    public ?int $deleteId = null;

    // 🔗 Simpan search/filter di URL agar bisa di-bookmark
    protected $queryString = ['search', 'kategori'];


    //Aturan validasi
    protected function rules()
    {
        return[
            'cover' => is_string($this->cover) ? 'nullable' : 'nullable|image|max:1024',
            'title' => 'required|min:3|max:255',
            'penulis' => 'required|min:3|max:255',
            'penerbit' => 'nullable|max:255',
            'tahun_terbit' => 'nullable|integer|min:1900|max:' .date('Y'),
            'stok'=> 'required|integer|min:0',

        ];
    }

    //Reset halaman saat search berubah
    public function updatingSearch()
    {   $this->resetPage();   
    }

    // Reset semua filter pencarian dan kategori
    public function resetFilters()
    {
        $this->search = '';
        $this->kategori = '';
        $this->resetPage();
    }

    // ➕ Buka modal TAMBAH buku baru
    public function openModal()
    {
        $this->resetForm();  //Kosongkan form dulu
        $this->showModal = true;
        $this->isEdit = false;
    }

    // ✏️ Buka modal EDIT — isi form dengan data buku yang dipilih
    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        $this->cover = $book->cover;
        $this->bookId = $book->id;
        $this->title = $book->judul;
        $this->penulis = $book->penulis;
        $this->penerbit = $book->penerbit;
        $this->tahun_terbit = $book->tahun_terbit;
        $this->isbn = $book->isbn;
        $this->stok = $book->stok;
        $this->kategoriInput = $book->kategori;
        $this->deskripsi = $book->deskripsi;
     
        $this->showModal = true;
        $this->isEdit = true;      // Mode: edit
    }

public function save()
    {
        $this->validate();

        $coverPath = $this->cover;
        if (!is_string($this->cover) && $this->cover) {
            $coverPath = $this->cover->store('covers', 'public');
        }

        $data = [
            'cover' => $coverPath,
            'judul' => $this->title,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit ?: null,
            'tahun_terbit' => $this->tahun_terbit,
            'isbn' => $this->isbn ?: null,
            'stok' => $this->stok,
            'kategori' => $this->kategoriInput ?: null,
            'deskripsi' => $this->deskripsi ?: null,
        ];

        if ($this->isEdit && $this->bookId) {
            Book::find($this->bookId)->update($data);
            session()->flash('message', 'Buku berhasil diperbarui!');
        } else {
            Book::create($data);
            session()->flash('message', 'Buku berhasil ditambahkan!');
        }

        $this->closeModal();
    }

    public function confirmDelete($id) 
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteBook()
    {
        if ($this->deleteId) {
            $book = Book::find($this->deleteId);
            
            if ($book) {
                // Delete cover image if exists
                if ($book->cover) {
                    Storage::disk('public')->delete($book->cover);
                }
                
                $book->delete();
                session()->flash('message', 'Buku berhasil dihapus!');
            }
        }
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->cover = null;
        $this->bookId = null;
        $this->title = '';
        $this->penulis = '';
        $this->penerbit = '';
        $this->tahun_terbit = null;
        $this->isbn = '';
        $this->stok = 1;
        $this->kategoriInput = '';
        $this->deskripsi = '';
        $this->isEdit = false;
    }

    public function render()
    {
        $books = Book::query()
            ->when($this->search, fn($q) => $q->where('judul', 'like', "%{$this->search}%")
                ->orWhere('penulis', 'like', "%{$this->search}%"))
            ->when($this->kategori, fn($q) => $q->where('kategori', $this->kategori))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $kategoris = Book::whereNotNull('kategori')->distinct()->pluck('kategori');

        return view('livewire.books.index', [
            'books' => $books,
            'kategoris' => $kategoris,
        ])->layout('layouts.app');
    }
}
