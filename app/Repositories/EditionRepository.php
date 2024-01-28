<?php

namespace App\Repositories;

use App\Contracts\Repositories\EditionRepositoryInterface;
use App\Enums\StatusEnum;
use App\Models\Edition;
use Illuminate\Support\Facades\Log;

class EditionRepository implements EditionRepositoryInterface
{
    public function __construct(
        private Edition $model
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->get();
    }

    public function getEditionById(int $id)
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->findOrFail($id);
    }

    public function createEdition(array $data)
    {
        $attributes = [
            'name' => $data['name']
        ];
        $data['status'] = StatusEnum::ACTIVE->value;
        $edition = $this->model::updateOrCreate($attributes, $data);

        return $edition;
    }

    public function updateEditionById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));

        $this->model::findOrFail($id)->update($data);
        $edition = $this->model::findOrFail($id)->refresh();

        return $edition;
    }

    public function deleteEditionById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => StatusEnum::DELETED->value]);
        Log::info("Deleted Edition >> " . $result . " Edition " . print_r($this->model::findOrFail($id), true));
        return $this->model::findOrFail($id)->refresh();
    }

    // public function getEditionByTitle(string $title)
    // {
    //     return $this->model->where('title', $title)->first();
    // }

    public function searchEdition(string $key, string $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
