<!DOCTYPE html>
<html>
<head>
    <title>{{ $book['title'] }}</title>
</head>
<body>
    <h1>{{ $book['title'] }}</h1>

    <p><strong>Author:</strong> {{ $book['author'] }}</p>
    <p><strong>Year:</strong> {{ $book['year'] }}</p>
    <p><strong>Genre:</strong> {{ $book['genre'] }}</p>
    <p><strong>ID:</strong> {{ $book['id'] }}</p>

    <p><a href="/books">&larr; Back to all books</a></p>

    <hr>
    <p>Justin Booj T. Regalado</p>
</body>
</html>