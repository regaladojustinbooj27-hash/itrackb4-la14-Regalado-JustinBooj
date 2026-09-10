<nav class="navbar navbar-expand navbar-light bg-light rounded px-3 mb-3">
    <a class="navbar-brand" href="{{ route('books.index') }}">Books</a>
    <div class="navbar-nav d-flex flex-row align-items-center gap-2">
        <a class="nav-link" href="{{ route('books.index') }}">All Books</a>
        <a class="btn btn-outline-primary btn-sm" href="{{ route('books.featured') }}">Featured</a>
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('books.filter', 'Dystopian') }}">Dystopian</a>
    </div>
</nav>