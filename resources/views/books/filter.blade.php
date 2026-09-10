@extends('layouts.app')

@section('title', ($genre ?? 'All') . ' Books')

@section('content')
    <h2>{{ $genre ?? 'All' }} Books</h2>

    @if (count($books) > 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>
                            <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                        </td>
                        <td>{{ $book['author'] }}</td>
                        <td>{{ $book['year'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No books found in this genre.</p>
    @endif

    <a href="{{ route('books.index') }}" class="btn btn-primary">&larr; Back to all books</a>
@endsection