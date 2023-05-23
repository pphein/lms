<?php

namespace App\Services;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorCollection;
use App\Contracts\Services\AuthorServiceInterface;
use App\Contracts\Repositories\AuthorRepositoryInterface;

class AuthorService implements AuthorServiceInterface
{
    public function __construct(
        private AuthorRepositoryInterface $authorRepo
    ) {
    }

    public function getList()
    {
        $result = $this->authorRepo->getList();

        return new AuthorCollection($result);
    }

    public function createAuthor(array $data)
    {
        $result = $this->authorRepo->createAuthor($data);

        return new AuthorResource($result);
    }

    public function getAuthorById(int $id)
    {
        $result = $this->authorRepo->getAuthorById($id);

        return new AuthorResource($result);
    }

    public function updateAuthorById(int $id, array $data)
    {
        $result = $this->authorRepo->updateAuthorById($id, $data);

        return new AuthorResource($result);
    }

    public function destroyAuthorById(int $id): bool
    {
        $result = $this->authorRepo->deleteAuthorById($id);

        return true;
    }

    // public function getAuthorByTitle(string $title)
    // {
    //     $result = $this->authorRepo->getAuthorByTitle($title);

    //     return new AuthorResource($result);
    // }

    public function getAuthorByAuthor(string $author)
    {
        $result = $this->authorRepo->getAuthorByAuthor($author);

        return new AuthorCollection($result);
    }

    // public function getAuthorByPublisher(string $publisher)
    // {
    //     $result = $this->authorRepo->getAuthorByPublisher($publisher);

    //     return new AuthorResource($result);
    // }

    public function searchAuthor(string $key, string $value)
    {
        $result = $this->authorRepo->searchAuthor($key, $value);

        return new AuthorResource($result);
    }
}
