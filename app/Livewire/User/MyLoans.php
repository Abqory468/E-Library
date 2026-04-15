<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Loan;
use App\Notifications\BookReturned;
use Livewire\WithPagination;

class MyLoans extends Component
{
    use WithPagination;

    public function returnBook($loanId)
    {
        $loan = Loan::where('user_id', auth()->id())
            ->where('id', $loanId)
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

    public function render()
    {
        $loans = Loan::with('book')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.user.my-loans', [
            'loans' => $loans,
        ])->layout('layouts.app');
    }
}
