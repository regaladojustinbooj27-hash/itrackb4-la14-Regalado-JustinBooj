<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/filter/{genre?}', [BookController::class, 'filter'])
    ->name('books.filter');

Route::resource('books', BookController::class)
    ->only(['index', 'show']);

Route::get('/teachers/featured', [TeacherController::class, 'featured'])
    ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
    ->only(['index', 'show']);

