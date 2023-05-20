<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();

        foreach ($books as $book) {
            $author = Author::where('pen_name', $book->author_id)->first()?->id;
            $book->authors()->attach($author);
        }
    }
}
