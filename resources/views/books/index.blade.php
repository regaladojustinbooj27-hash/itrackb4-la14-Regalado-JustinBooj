<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>

    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a>
                — {{ $book['author'] }} ({{ $book['year'] }})
            </li>
        @endforeach
    </ul>

    <hr>
    <p>Justin Booj T. Regalado</p>
</body>
</html>