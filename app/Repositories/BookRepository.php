<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\Log;
use App\Contracts\Repositories\BookRepositoryInterface;
use App\Contracts\Repositories\AuthorRepositoryInterface;
use App\Contracts\Repositories\EditionRepositoryInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\PublisherRepositoryInterface;
use App\Enums\StatusEnum;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(
        private Book $model,
        private AuthorRepositoryInterface $author,
        private EditionRepositoryInterface $edition,
        private CategoryRepositoryInterface $category,
        private PublisherRepositoryInterface $publisher,
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->get();
    }

    public function getBookById(int $id)
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->findOrFail($id);
    }

    public function createBook(array $data)
    {
        $data['author'] = $this->author->createAuthor(['pen_name' => $data['author']])->id;
        $data['publisher'] = $this->publisher->createPublisher(['name' => $data['publisher']])->id;
        $data['edition'] = $this->edition->createEdition(['name' => $data['edition']])->id;
        $data['category_id'] = $this->category->createCategory(['name' => $data['category']])->id;
        $attributes = [
            'title' => $data['title'],
            'author_id' => $data['author'],
            'publisher_id' => $data['publisher'],
            'edition_id' => $data['edition']
        ];
        $data['status'] = StatusEnum::ACTIVE->value;
        $book = $this->model::updateOrCreate($attributes, $data);
        $book->authors()->attach($book->author_id);

        return $book;
    }

    public function updateBookById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));
        $data['author_id'] = $this->author->createAuthor(['pen_name' => $data['author']])->id;
        $data['publisher_id'] = $this->publisher->createPublisher(['name' => $data['publisher']])->id;
        $data['edition_id'] = $this->edition->createEdition(['name' => $data['edition']])->id;
        $data['category_id'] = $this->category->createCategory(['name' => $data['category']])->id;

        Log::info("Formatted Data >> " . print_r($data, true));
        $this->model::findOrFail($id)->update($data);
        $book = $this->model::findOrFail($id)->refresh();
        $book->authors()->attach($book->author_id);

        return $book;
    }

    public function deleteBookById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => StatusEnum::DELETED->value]);
        Log::info("Deleted author >> " . $result . " author " . print_r($this->model::findOrFail($id), true));
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
