<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
{
    $title = '';
    $books = Book::all(); 

    return view('books.index', compact('title', 'books'));
}

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $book = Book::findOrFail(5); // 1984

        return view('books.show', compact('book'));
    }

    public function filter($genre = null)
    {
        $books = Book::all();

        if ($genre !== null) {
            $books = $books->filter(function ($book) use ($genre) {
                return strtolower($book->genre ?? '') === strtolower($genre);
            });
        }

        return view('books.filter', compact('books', 'genre'));
    }
}