@extends('layouts.app')

@section('title', 'All Books')  
@section('content')

    <p>
        Showing —
        Genre: <strong>{{ $genre ?? 'All' }}</strong> &nbsp;|&nbsp;
        Author: <strong>{{ $author ?? 'All' }}</strong>
    </p>

    <p>
        <strong>Genre:</strong>
        @foreach (['Dystopian', 'Romance', 'Tragedy', 'Drama', 'Historical Fiction'] as $g)
            <a href="{{ route('books.index', ['genre' => $g, 'author' => $author]) }}">{{ $g }}</a>
            &nbsp;
        @endforeach
    </p>

    <p>
        <strong>Author:</strong>
        @foreach (['George Orwell', 'Leo Tolstoy', 'Jane Austen', 'Harper Lee', 'F. Scott Fitzgerald'] as $a)
            <a href="{{ route('books.index', ['genre' => $genre, 'author' => $a]) }}">{{ $a }}</a>
            &nbsp;
        @endforeach
    </p>

    <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Clear filters</a>
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                    </td>
                    <td>{{ $book['author'] }}</td>
                    <td>
                        {{ $book['year'] }}
                        @if ($book['year'] < 1900)
                            <span class="badge bg-secondary">Classic</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no books to show right now </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection