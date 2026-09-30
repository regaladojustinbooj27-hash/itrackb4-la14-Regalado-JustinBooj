@extends('layouts.app')

@section('title', 'Add a Book')

@section('content')

    <h2>Add a Book</h2>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn"
                   class="form-control @error('isbn') is-invalid @enderror"
                   value="{{ old('isbn') }}">
            @error('isbn')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select name="author" id="author"
                    class="form-select @error('author') is-invalid @enderror">
                <option value="" disabled {{ old('author') ? '' : 'selected' }}>Choose an author</option>
                @foreach (['Robert C. Martin', 'Freeman & Robson', 'Marijn Haverbeke', 'David Sklar', 'Martin Fowler'] as $a)
                    <option value="{{ $a }}" {{ old('author') === $a ? 'selected' : '' }}>
                        {{ $a }}
                    </option>
                @endforeach
            </select>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" name="pages" id="pages"
                   class="form-control @error('pages') is-invalid @enderror"
                   value="{{ old('pages') }}">
            @error('pages')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year"
                   class="form-control @error('year') is-invalid @enderror"
                   value="{{ old('year') }}">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection