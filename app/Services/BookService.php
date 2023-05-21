<?php

namespace App\Services;

use App\Http\Resources\BookCollection;
use App\Contracts\Services\BookServiceInterface;
use App\Contracts\Repositories\BookRepositoryInterface;
use App\Http\Resources\BookResource;

class BookService implements BookServiceInterface
{
    public function __construct(
        private BookRepositoryInterface $bookRepo
    ) {
    }

    public function getList()
    {
        $result = $this->bookRepo->getList();

        return new BookCollection($result);
    }

    public function createBook(array $data)
    {
        $result = $this->bookRepo->createBook($data);

        return new BookResource($result);
    }

    public function getBookById(int $id)
    {
        $result = $this->bookRepo->getBookById($id);

        return new BookResource($result);
    }

    public function updateBookById(int $id, array $data)
    {
        $result = $this->bookRepo->updateBookById($id, $data);

        return new BookResource($result);
    }

    public function destroyBookById(int $id): bool
    {
        $result = $this->bookRepo->deleteBookById($id);

        return true;
    }

    // public function getBookByTitle(string $title)
    // {
    //     $result = $this->bookRepo->getBookByTitle($title);

    //     return new BookResource($result);
    // }

    public function getBookByAuthor(string $author)
    {
        $result = $this->bookRepo->getBookByAuthor($author);

        return new BookCollection($result);
    }

    // public function getBookByPublisher(string $publisher)
    // {
    //     $result = $this->bookRepo->getBookByPublisher($publisher);

    //     return new BookResource($result);
    // }

    public function searchBook(string $key, string $value)
    {
        $result = $this->bookRepo->searchBook($key, $value);

        return new BookResource($result);
    }
}
