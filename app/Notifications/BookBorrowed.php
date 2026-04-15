<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BookBorrowed extends Notification
{
    use Queueable;

    protected $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'book_id' => $this->book->id,
            'book_title' => $this->book->judul,
            'message' => 'Anda berhasil meminjam buku: ' . $this->book->judul,
            'type' => 'borrow'
        ];
    }
}
