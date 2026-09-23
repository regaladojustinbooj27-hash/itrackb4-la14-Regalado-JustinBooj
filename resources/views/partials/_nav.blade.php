<nav>
    <a href="{{ route('books.index') }}" class="{{ request()->is('books*') ? 'active' : '' }}">
        Books
    </a>
</nav>