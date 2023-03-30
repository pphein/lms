<?php

namespace Database\Seeders;

use Exception;
use App\Models\Book;
use App\Models\Author;
use App\Models\Edition;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class BookSeeder extends Seeder
{
    protected $depends = [
        AuthorSeeder::class,
        PublisherSeeder::class,
        EditionSeeder::class,
        CategorySeeder::class,
    ];

    public function __construct(
        private Book $model,
        private Author $author,
        private Publisher $publisher,
        private Edition $edition,
        private Category $category
    ) {
    }

    public function run(): void
    {
        try {
            $books = json_decode(
                file_get_contents(__DIR__ . '/../data/books.json'),
                true
            );
            foreach ($books as $book) {
                $data = [
                    "title" => $book['title'],
                    "summary" => $book['summary'],
                    "author_id" => $this->author->where('pen_name', $book['author'])->first()?->id,
                    "publisher_id" => $this->publisher->where('name', $book['publisher'])->first()?->id,
                    "edition_id" => $this->edition->where('name', $book['edition'])->first()?->id,
                    "price" => $book['price'],
                    "category_id" => $this->category->where('name', $book['category'])->first()?->id,
                ];
                $this->model::firstOrCreate($data);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
