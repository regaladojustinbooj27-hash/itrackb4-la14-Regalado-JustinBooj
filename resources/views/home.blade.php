@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="card mb-4">
    <div class="card-body d-flex align-items-center">
        <img src="{{ asset('img/me.jpg') }}" width="96" height="96"
             class="rounded-circle me-3" style="object-fit: cover;"
             alt="Photo of Justin Booj T. Regalado">
        <div>
            <h5 class="mb-1">Justin Booj T. Regalado</h5>
            <div class="text-muted">BSInfoTech &middot; 4th year &middot; A</div>
        </div>
    </div>
</div>

    <div class="row text-center">
    <div class="col-sm-6 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="display-5">{{ $bookCount }}</div>
                <div class="text-muted">books in the collection</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="display-5">{{ $genreCount }}</div>
                <div class="text-muted">genres to browse</div>
            </div>
        </div>
    </div>
</div>

    <div class="p-5 mb-4 bg-light rounded-3">
        <h2>Keep track of every book you've read and the ones you still want to</h2>
        <p class="lead">Browse the whole collection, search it by title, narrow it by genre, and see at a glance which books are available to borrow.</p>
        <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">Browse the books</a>
    </div>


@endsection