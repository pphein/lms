<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(
        private Book $model
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
