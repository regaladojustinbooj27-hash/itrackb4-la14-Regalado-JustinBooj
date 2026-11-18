<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index(Request $request)
{
    $genres = Genre::all();

    $search = $request->query('search');
    $genreId = $request->query('genre_id');
    $available = $request->query('available');

    $sort = $request->query('sort', 'title');

    if (! in_array($sort, ['title', 'year'])) {
        $sort = 'title';
    }

    $query = Book::with('genre');

    if ($search) {
        $query = $query->where('title', 'like', "%{$search}%");
    }

    if ($genreId) {
        $query = $query->where('genre_id', $genreId);
    }

    if ($available !== null && $available !== '') {
        $query = $query->where('is_available', (int) $available);
    }

    $books = $query->orderBy($sort)->paginate(8)->withQueryString();

    return view('books.index', compact('books', 'genres'));
}

    public function create()
    {
        $genres = Genre::all();

        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1|max:2100',
            'is_available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
{
    return view('books.show', compact('book'));
}

public function edit(Book $book)
{
    $genres = Genre::all();

    return view('books.edit', compact('book', 'genres'));
}

public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'year' => 'required|integer|min:1|max:2100',
        'is_available' => 'required|boolean',
        'genre_id' => 'required|exists:genres,id',
    ]);

    $book->update($validated);

    Log::info('Book updated', [
        'id' => $book->id,
        'title' => $book->title,
        'genre_id' => $book->genre_id,
    ]);

    return redirect()->route('books.index');
}

public function destroy(Book $book)
{
    abort_if($book->genre->books()->count() === 1, 403);

    $book->delete();

    return redirect()->route('books.index');
}

    public function featured()
    {
        $book = Book::findOrFail(5); // 1984

        return view('books.show', compact('book'));
    }
}