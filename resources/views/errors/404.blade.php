@extends('layouts.app')

@section('title', 'Page not found')

@section('content')
    <h1>Page not found</h1>
    <p>That page doesn't exist, or the book you asked for has been removed.</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to the list</a>
@endsection