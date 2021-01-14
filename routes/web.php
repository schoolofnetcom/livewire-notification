<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::get('/books', function(){
    return Book::all();
});

require __DIR__.'/auth.php';
