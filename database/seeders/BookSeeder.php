<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Lookup rows first, each held in a variable
        $historical = Genre::create(['name' => 'Historical Fiction']);
        $tragedy    = Genre::create(['name' => 'Tragedy']);
        $romance    = Genre::create(['name' => 'Romance']);
        $drama      = Genre::create(['name' => 'Drama']);
        $dystopian  = Genre::create(['name' => 'Dystopian']);
        $fantasy    = Genre::create(['name' => 'Fantasy']);

        // title, author, year, available, genre
        // The first six keep their old ids, so /books/featured still shows 1984.
        $books = [
            ['War and Peace', 'Leo Tolstoy', 1869, true, $historical],
            ['The Great Gatsby', 'F. Scott Fitzgerald', 1925, true, $tragedy],
            ['Pride and Prejudice', 'Jane Austen', 1813, false, $romance],
            ['To Kill a Mockingbird', 'Harper Lee', 1960, true, $drama],
            ['1984', 'George Orwell', 1949, true, $dystopian],
            ['Animal Farm', 'George Orwell', 1945, false, $dystopian],

            ['A Tale of Two Cities', 'Charles Dickens', 1859, true, $historical],
            ['The Name of the Rose', 'Umberto Eco', 1980, true, $historical],
            ['Wolf Hall', 'Hilary Mantel', 2009, false, $historical],

            ['Anna Karenina', 'Leo Tolstoy', 1877, true, $tragedy],
            ['Of Mice and Men', 'John Steinbeck', 1937, true, $tragedy],
            ['Tess of the d\'Urbervilles', 'Thomas Hardy', 1891, false, $tragedy],

            ['Jane Eyre', 'Charlotte Brontë', 1847, true, $romance],
            ['Sense and Sensibility', 'Jane Austen', 1811, true, $romance],
            ['Wuthering Heights', 'Emily Brontë', 1847, true, $romance],

            ['The Catcher in the Rye', 'J. D. Salinger', 1951, true, $drama],
            ['A Raisin in the Sun', 'Lorraine Hansberry', 1959, false, $drama],
            ['The Kite Runner', 'Khaled Hosseini', 2003, true, $drama],

            ['Brave New World', 'Aldous Huxley', 1932, true, $dystopian],
            ['Fahrenheit 451', 'Ray Bradbury', 1953, true, $dystopian],
            ['The Handmaid\'s Tale', 'Margaret Atwood', 1985, false, $dystopian],

            ['The Hobbit', 'J. R. R. Tolkien', 1937, true, $fantasy],
            ['The Lion, the Witch and the Wardrobe', 'C. S. Lewis', 1950, true, $fantasy],
            ['A Wizard of Earthsea', 'Ursula K. Le Guin', 1968, false, $fantasy],
            ['Harry Potter and the Philosopher\'s Stone', 'J. K. Rowling', 1997, true, $fantasy],
        ];

        foreach ($books as [$title, $author, $year, $available, $genre]) {
            Book::create([
                'title' => $title,
                'author' => $author,
                'year' => $year,
                'is_available' => $available,
                'genre_id' => $genre->id,
            ]);
        }
    }
}