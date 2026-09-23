<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books/filter/{author?}', function ($author = null) {
    return redirect()->route('books.index', $author ? ['author' => $author] : []);
})->name('books.filter');

Route::resource('books', BookController::class)
    ->only(['index', 'show']);
