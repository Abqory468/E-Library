<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Books\Index as BooksIndex;
use App\Livewire\Loans\Index as LoansIndex;
use App\Livewire\Returns\Index as ReturnsIndex;
use App\Livewire\Profile\Index as ProfileIndex;
use App\Livewire\Books\AllBooks;
use App\Livewire\Books\ShowBook;
use App\Livewire\Help;
use App\Livewire\User\Home;
use App\Livewire\User\Wishlist;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\MyLoans;
use Illuminate\Support\Facades\Route;

// Set locale (language switcher)
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('set-locale');

// Halaman utama
Route::get('/', Home::class)->name('home');
Route::get('/all-books', AllBooks::class)->name('allBooks');
Route::get('/books/{id}', ShowBook::class)->name('books.show');
Route::get('/help', Help::class)->name('help');
Route::get('/wishlist', Wishlist::class)->middleware('auth')->name('wishlist');

// Dashboard → cek role, arahkan ke dashboard yang sesuai
Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? 'user';
    if ($role === 'admin') {
        return app(AdminDashboard::class)();
    }

    return app(UserDashboard::class)();
})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman-halaman yang butuh login
Route::middleware('auth')->group(function () {
    Route::get('/books', BooksIndex::class)->name('books');
    
    // Admin only routes
    Route::middleware('can:admin')->group(function () {
        Route::get('/loans', LoansIndex::class)->name('loans');
        Route::get('/returns', ReturnsIndex::class)->name('returns');
    });

    // Profile
    Route::get('/profile', ProfileIndex::class)->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tambahan untuk user member
    Route::get('/my-loans', MyLoans::class)->name('my-loans');
});

require __DIR__.'/auth.php';