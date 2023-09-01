<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        private Category $model
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', 0)->get();
    }

    public function getCategoryById(int $id)
    {
        return $this->model::where('status', 0)->findOrFail($id);
    }

    public function createCategory(array $data)
    {
        $attributes = [
            'name' => $data['name']
        ];
        $category = $this->model::firstOrCreate($attributes, $data);

        return $category;
    }

    public function updateCategoryById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));

        $this->model::findOrFail($id)->update($data);
        $category = $this->model::findOrFail($id)->refresh();

        return $category;
    }

    public function deleteCategoryById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => 1]);
        Log::info("Deleted Category >> " . $result . " Category " . print_r($this->model::findOrFail($id), true));
        return $this->model::findOrFail($id)->refresh();
    }

    // public function getCategoryByTitle(string $title)
    // {
    //     return $this->model->where('title', $title)->first();
    // }

    public function searchCategory(string $key, string $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
