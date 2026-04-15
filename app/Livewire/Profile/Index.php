<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Index extends Component
{
    // ---------- Update Password ----------
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $passwordUpdated = false;

    public function updatePassword(): void
    {
        $this->validate([
            'current_password'      => ['required', 'current_password'],
            'password'              => ['required', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');
        $this->passwordUpdated = true;
    }

    public function render()
    {
        return view('livewire.profile.edit')
            ->layout('layouts.app');
    }
}
