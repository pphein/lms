<?php

namespace App\Services;

use App\Contracts\Services\PublisherServiceInterface;
use App\Contracts\Repositories\PublisherRepositoryInterface;
use App\Http\Resources\PublisherCollection;
use App\Http\Resources\PublisherResource;

class PublisherService implements PublisherServiceInterface
{
    public function __construct(
        private PublisherRepositoryInterface $publisherRepo
    ) {
    }

    public function getList()
    {
        $result = $this->publisherRepo->getList();

        return new PublisherCollection($result);
    }

    public function createPublisher(array $data)
    {
        $result = $this->publisherRepo->createPublisher($data);

        return new PublisherResource($result);
    }

    public function getPublisherById(int $id)
    {
        $result = $this->publisherRepo->getPublisherById($id);

        return new PublisherResource($result);
    }

    public function updatePublisherById(int $id, array $data)
    {
        $result = $this->publisherRepo->updatePublisherById($id, $data);

        return new PublisherResource($result);
    }

    public function destroyPublisherById(int $id): bool
    {
        $result = $this->publisherRepo->deletePublisherById($id);

        return true;
    }

    // public function getPublisherByTitle(string $title)
    // {
    //     $result = $this->publisherRepo->getPublisherByTitle($title);

    //     return new PublisherResource($result);
    // }

    public function getPublisherByPublisher(string $Publisher)
    {
        $result = $this->publisherRepo->getPublisherByPublisher($Publisher);

        return new PublisherCollection($result);
    }

    // public function getPublisherByPublisher(string $publisher)
    // {
    //     $result = $this->publisherRepo->getPublisherByPublisher($publisher);

    //     return new PublisherResource($result);
    // }

    public function searchPublisher(string $key, string $value)
    {
        $result = $this->publisherRepo->searchPublisher($key, $value);

        return new PublisherResource($result);
    }
}
