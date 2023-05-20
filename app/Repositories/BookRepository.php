<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Log;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(
        private Book $model,
        private Author $author,
    ) {
    }

    public function getList()
    {
        return $this->model::get();
    }

    public function getBookById(int $id)
    {
        return $this->model::findOrFail($id);
    }

    public function createBook(array $data)
    {
        $attributes = [
            'title' => $data['title'],
            'author' => $data['author']
        ];
        return $this->model::firstOrCreate($attributes, $data);
    }

    public function updateBookById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));
        $author = $this->author::where('pen_name', $data['author_id'])->first();
        $data['author_id'] = $author?->id ?? 1;

        Log::info("Formatted Data >> " . print_r($data, true));
        $this->model::findOrFail($id)->update($data);
        return $this->model::findOrFail($id)->refresh();
    }

    public function deleteBookById(int $id)
    {
        Log::info("Update Data >> " . print_r($data, true));
        $author = $this->author::where('pen_name', $data['author_id'])->first();
        $data['author_id'] = $author?->id ?? 1;

        Log::info("Formatted Data >> " . print_r($data, true));
        $this->model::findOrFail($id)->update($data);
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
}
