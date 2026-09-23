<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
     private function getBooks()
    {
        return [
            1 => ['id' => 1, 'title' => 'War and Peace', 'author' => 'Leo Tolstoy', 'year' => 1869, 'genre' => 'Historical Fiction'],
            2 => ['id' => 2, 'title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'year' => 1925, 'genre' => 'Tragedy'],
            3 => ['id' => 3, 'title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'year' => 1813, 'genre' => 'Romance'],
            4 => ['id' => 4, 'title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'year' => 1960, 'genre' => 'Drama'],
            5 => ['id' => 5, 'title' => '1984', 'author' => 'George Orwell', 'year' => 1949, 'genre' => 'Dystopian'],
            6 => ['id' => 6, 'title' => 'Animal Farm', 'author' => 'George Orwell', 'year' => 1945, 'genre' => 'Dystopian'],
        ];
    }
   

    
   

// ...

public function index(Request $request)
{
    $genre = $request->query('genre', null);
    $author = $request->query('author', null);

    $books = $this->getBooks();

    if ($genre !== null) {
        $books = array_filter($books, function ($book) use ($genre) {
            return strtolower($book['genre']) === strtolower($genre);
        });
    }

    if ($author !== null) {
        $books = array_filter($books, function ($book) use ($author) {
            return strtolower($book['author']) === strtolower($author);
        });
    }

    return view('books.index', [
        'books' => $books,
        'genre' => $genre,
        'author' => $author,
    ]);
}

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = $this->getBooks();

        if (!isset($books[$id])) {
            abort(404);
        }

        $book = $books[$id];

        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
    public function featured()
    {
        $books = $this->getBooks();

        $book = $books[5]; 

        return view('books.show', ['book' => $book]);
    }


    public function filter($genre = null)
    {
        $books = $this->getBooks();

        if ($genre === null) {
            return view('books.filter', ['books' => $books, 'genre' => null]);
        }

        $filtered = array_filter($books, function ($book) use ($genre) {
            return strtolower($book['genre']) === strtolower($genre);
        });

        return view('books.filter', ['books' => $filtered, 'genre' => $genre]);
    }

}