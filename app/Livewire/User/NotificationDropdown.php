<?php

namespace App\Livewire\User;

use Livewire\Component;

class NotificationDropdown extends Component
{
    public function getNotificationsProperty()
    {
        return auth()->user()->notifications()->latest()->take(5)->get();
    }

    public function getUnreadCountProperty()
    {
        return auth()->user()->unreadNotifications()->count();
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function render()
    {
        return view('livewire.user.notification-dropdown');
    }
}
