<?php

namespace App\Repositories;

use App\Models\Publisher;
use Illuminate\Support\Facades\Log;
use App\Contracts\Repositories\PublisherRepositoryInterface;
use App\Enums\StatusEnum;

class PublisherRepository implements PublisherRepositoryInterface
{
    public function __construct(
        private Publisher $model
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->get();
    }

    public function getPublisherById(int $id)
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->findOrFail($id);
    }

    public function createPublisher(array $data)
    {
        $attributes = [
            'name' => $data['name']
        ];
        $data['status'] = StatusEnum::ACTIVE->value;
        $publisher = $this->model::updateOrCreate($attributes, $data);

        return $publisher;
    }

    public function updatePublisherById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));

        $this->model::findOrFail($id)->update($data);
        $publisher = $this->model::findOrFail($id)->refresh();

        return $publisher;
    }

    public function deletePublisherById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => StatusEnum::DELETED->value]);
        Log::info("Deleted Publisher >> " . $result . " Publisher " . print_r($this->model::findOrFail($id)->toArray(), true));
        return $this->model::findOrFail($id)->refresh();
    }

    // public function getPublisherByTitle(string $title)
    // {
    //     return $this->model->where('title', $title)->first();
    // }

    public function searchPublisher(string $key, string $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
