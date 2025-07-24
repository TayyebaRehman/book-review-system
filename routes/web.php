<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Redirect dashboard to book list
Route::get('/dashboard', function () {
    return redirect()->route('books.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // Book browsing for all authenticated users
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Review routes
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});



// Admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', [
        'totalBooks' => \App\Models\Book::count(),
        'totalUsers' => \App\Models\User::count(),
        'totalReviews' => \App\Models\Review::count()
    ]);
})->middleware(['auth', 'admin'])->name('admin.dashboard');


// Auth scaffolding (login, register, etc.)
require __DIR__.'/auth.php';
