<!DOCTYPE html>
<html lang="en">
<head>
    <title>BookList</title>
</head>
<body>
    <h1>Book List</h1>
    <p>Prepared by: Justin Booj Regalado</p>

    <table border="1" cellpadding="8"
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
    <tr>
        
        @foreach ($books as $book)
        <tr>
            <td>{{ $book['title']}}<td>
            <td>{{ $book['author']}}<td>
            <td>{{ $book['year']}}<td>
        <tr>
        @endforeach
        </table>
</body>
</html>