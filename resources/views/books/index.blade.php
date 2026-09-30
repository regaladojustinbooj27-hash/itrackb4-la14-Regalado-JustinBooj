@extends('layouts.app')

@section('title', 'All Books')

@section('content')

    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm">+ Add a Book</a>
    <br><br>

    <p>
        Showing —
        Author: <strong>{{ $author ?? 'All' }}</strong> &nbsp;|&nbsp;
        Title contains: <strong>{{ $title ?? 'anything' }}</strong>
    </p>

    <p>
        <strong>Author:</strong>
        @foreach (['Robert C. Martin', 'Freeman & Robson', 'Marijn Haverbeke', 'David Sklar', 'Martin Fowler'] as $a)
            <a href="{{ route('books.index', ['author' => $a, 'title' => $title]) }}">{{ $a }}</a>
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
                <th>Pages</th>
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
                    <td>{{ $book['pages'] }}</td>
                    <td>{{ $book['year'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no books to show right now</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection