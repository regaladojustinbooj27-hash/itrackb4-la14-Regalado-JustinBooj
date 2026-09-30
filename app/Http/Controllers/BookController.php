<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private function getBooks()
    {
        $path = storage_path('app/books.json');

        $json = file_get_contents($path);

        return json_decode($json, true);
    }

    private function saveBooks(array $books)
    {
        $path = storage_path('app/books.json');

        file_put_contents($path, json_encode($books, JSON_PRETTY_PRINT));
    }

    public function index(Request $request)
    {
        $author = $request->query('author', null);
        $title = $request->query('title', null);

        $books = $this->getBooks();

        if ($author !== null) {
            $books = array_filter($books, function ($book) use ($author) {
                return strtolower($book['author']) === strtolower($author);
            });
        }

        if ($title !== null) {
            $books = array_filter($books, function ($book) use ($title) {
                return str_contains(strtolower($book['title']), strtolower($title));
            });
        }

        return view('books.index', [
            'books' => $books,
            'author' => $author,
            'title' => $title,
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|string|min:10',
            'title' => 'required|string|max:255',
            'author' => 'required|in:Robert C. Martin,Freeman & Robson,Marijn Haverbeke,David Sklar,Martin Fowler',
            'pages' => 'required|integer|min:1',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
        ]);

        $books = $this->getBooks();

        $nextId = empty($books) ? 1 : max(array_keys($books)) + 1;

        $newBook = [
            'id' => $nextId,
            'isbn' => $validated['isbn'],
            'title' => $validated['title'],
            'author' => $validated['author'],
            'pages' => $validated['pages'],
            'year' => $validated['year'],
        ];

        $books[$nextId] = $newBook;

        $this->saveBooks($books);

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(string $id)
    {
        $books = $this->getBooks();

        if (!isset($books[$id])) {
            abort(404);
        }

        $book = $books[$id];

        return view('books.show', ['book' => $book]);
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
}