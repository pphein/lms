<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Support\Facades\Log;
use App\Contracts\Repositories\AuthorRepositoryInterface;
use App\Enums\StatusEnum;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function __construct(
        private Author $model
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->get();
    }

    public function getAuthorById(int $id)
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->findOrFail($id);
    }

    public function createAuthor(array $data)
    {
        $attributes = [
            'pen_name' => $data['pen_name']
        ];
        $data['status'] = StatusEnum::ACTIVE->value;
        $author = $this->model::updateOrCreate($attributes, $data);

        return $author;
    }

    public function updateAuthorById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));

        $this->model::findOrFail($id)->update($data);
        $author = $this->model::findOrFail($id)->refresh();

        return $author;
    }

    public function deleteAuthorById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => StatusEnum::DELETED->value]);
        Log::info("Deleted book >> " . $result . " author " . print_r($this->model::findOrFail($id), true));
        return $this->model::findOrFail($id)->refresh();
    }

    // public function getAuthorByTitle(string $title)
    // {
    //     return $this->model->where('title', $title)->first();
    // }

    public function searchAuthor(string $key, string $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
