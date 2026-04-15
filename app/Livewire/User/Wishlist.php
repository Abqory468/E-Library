<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Wishlist as WishlistModel;
use Livewire\WithPagination;

class Wishlist extends Component
{
    use WithPagination;

    public function removeWishlist($id)
    {
        WishlistModel::where('user_id', auth()->id())->where('id', $id)->delete();
    }

    public function render()
    {
        $wishlists = WishlistModel::with('book')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(12);

        return view('livewire.user.wishlist', [
            'wishlists' => $wishlists,
        ])->layout('layouts.app');
    }
}
