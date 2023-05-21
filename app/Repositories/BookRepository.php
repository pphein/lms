<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Edition;
use App\Models\Publisher;
use Illuminate\Support\Facades\Log;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(
        private Book $model,
        private Author $author,
        private Publisher $publisher,
        private Edition $edition,
        private Category $category
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', 0)->get();
    }

    public function getBookById(int $id)
    {
        return $this->model::where('status', 0)->findOrFail($id);
    }

    public function createBook(array $data)
    {
        $data['author'] = $this->author::firstOrCreate(['pen_name' => $data['author']])->id;
        $data['publisher'] = $this->publisher::firstOrCreate(['name' => $data['publisher']])->id;
        $data['edition'] = $this->edition::firstOrCreate(['name' => $data['edition']])->id;
        $data['category_id'] = $this->category::firstOrCreate(['name' => $data['category']])->id;
        $attributes = [
            'title' => $data['title'],
            'author_id' => $data['author'],
            'publisher_id' => $data['publisher'],
            'edition_id' => $data['edition']
        ];
        $book = $this->model::firstOrCreate($attributes, $data);
        $book->authors()->attach($book->author_id);

        return $book;
    }

    public function updateBookById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));
        $author = $this->author::where('pen_name', $data['author_id'])->first();
        $publisher = $this->publisher::where('name', $data['publisher_id'])->first();
        $edition = $this->edition::where('name', $data['edition_id'])->first();
        $data['author_id'] = $author?->id ?? 1;
        $data['publisher_id'] = $publisher?->id ?? 1;
        $data['edition_id'] = $edition?->id ?? 1;

        Log::info("Formatted Data >> " . print_r($data, true));
        $this->model::findOrFail($id)->update($data);
        return $this->model::findOrFail($id)->refresh();
    }

    public function deleteBookById(int $id)
    {
        $this->model::findOrFail($id)->update(['status' => 1]);
        return $this->model::findOrFail($id)->refresh();
    }

    // public function getBookByTitle(string $title)
    // {
    //     return $this->model->where('title', $title)->first();
    // }

    public function searchBook(string $key, string $value)
    {
        return $this->model->where($key, $value)->first();
    }

    public function getBookByAuthor(string $author)
    {
        $authorId = $this->author->where('pen_name', $author)->first()?->id;
        return $this->model->where('author_id', $authorId)->get();
    }
}
