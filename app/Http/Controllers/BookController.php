<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = [
        ['title' => 'War and Peach', 'author' => 'Leo Tolstyoy', 'year' => 1869],
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'year' => 1925],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'year' => 1813],
            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'year' => 1960],
            ['title' => '1984', 'author' => 'George Orwell', 'year' => 1949],
    ];

    return view('books.index', ['books' => $books]);
    }
}
