<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'War and Peace',
            'author' => 'Leo Tolstoy',
            'year' => 1869,
            'is_available' => true,
            'genre' => 'Historical Fiction',
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'year' => 1925,
            'is_available' => true,
            'genre' => 'Tragedy',
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
            'year' => 1813,
            'is_available' => false,
            'genre' => 'Romance',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'year' => 1960,
            'is_available' => true,
            'genre' => 'Drama',
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'year' => 1949,
            'is_available' => true,
            'genre' => 'Dystopian',
        ]);

        Book::create([
            'title' => 'Animal Farm',
            'author' => 'George Orwell',
            'year' => 1945,
            'is_available' => false,
            'genre' => 'Dystopian',
        ]);
    }
}