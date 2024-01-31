<?php

namespace App\Services;

use App\Http\Resources\EditionResource;
use App\Http\Resources\EditionCollection;
use App\Contracts\Services\EditionServiceInterface;
use App\Contracts\Repositories\EditionRepositoryInterface;

class EditionService implements EditionServiceInterface
{
    public function __construct(
        private EditionRepositoryInterface $edition
    ) {
    }

    public function getList()
    {
        $result = $this->edition->getList();

        return new EditionCollection($result);
    }

    public function createEdition(array $data)
    {
        $result = $this->edition->createEdition($data);

        return new EditionResource($result);
    }

    public function getEditionById(int $id)
    {
        $result = $this->edition->getEditionById($id);

        return new EditionResource($result);
    }

    public function updateEditionById(int $id, array $data)
    {
        $result = $this->edition->updateEditionById($id, $data);

        return new EditionResource($result);
    }

    public function destroyEditionById(int $id): bool
    {
        $result = $this->edition->deleteEditionById($id);

        return true;
    }
}
