<!DOCTYPE html>
<html>
<head>
    <title>{{ $genre ?? 'All' }} Books</title>
</head>
<body>
    <h1>{{ $genre ?? 'All' }} Books</h1>

    @if (count($books) > 0)
        <ul>
            @foreach ($books as $book)
                <li>
                    <a href="/books/{{ $book['id'] }}">{{ $book['title'] }}</a>
                    — {{ $book['author'] }} ({{ $book['year'] }})
                </li>
            @endforeach
        </ul>
    @else
        <p>No books found in this genre.</p>
    @endif

    <p><a href="/books">&larr; Back to all books</a></p>

    <hr>
    <p>Justin Booj T. Regalado</p>
</body>
</html>