@extends('layouts.app')

@section('title', 'All Books')

@section('content')

    @auth
        <a href="{{ route('books.create') }}" class="btn btn-success btn-sm">+ Add a Book</a>
    @endauth
    <br><br>

    <form method="GET" action="{{ route('books.index') }}" class="row g-2 mb-3">
    <div class="col-md-3">
        <input type="text" name="search" value="{{ request('search') }}"
               class="form-control" placeholder="Search titles">
    </div>

    <div class="col-md-2">
        <select name="genre_id" class="form-select">
            <option value="">All genres</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}"
                    @selected(request('genre_id') == $genre->id)>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <select name="available" class="form-select">
            <option value="">Any availability</option>
            <option value="1" @selected(request('available') === '1')>Available</option>
            <option value="0" @selected(request('available') === '0')>Not available</option>
        </select>
    </div>

    <div class="col-md-2">
        <select name="sort" class="form-select">
            <option value="title" @selected(request('sort', 'title') === 'title')>Sort by title</option>
            <option value="year" @selected(request('sort') === 'year')>Sort by year</option>
        </select>
    </div>

    <div class="col-md-3">
        <button class="btn btn-primary">Apply</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Clear</a>
    </div>
</form>


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                @auth
                    <th>Actions</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $books->firstItem() + $loop->index }}</td>
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
                    <td>{{ $book->genre->name }}</td>
                    @auth
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="{{ auth()->check() ? 6 : 5 }}">There are no books to show right now — check back later.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $books->links() }}
@endsection