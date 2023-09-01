<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Contracts\Services\CategoryServiceInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepo
    ) {
    }

    public function getList()
    {
        $result = $this->categoryRepo->getList();

        return new CategoryCollection($result);
    }

    public function createCategory(array $data)
    {
        $result = $this->categoryRepo->createCategory($data);

        return new CategoryResource($result);
    }

    public function getCategoryById(int $id)
    {
        $result = $this->categoryRepo->getCategoryById($id);

        return new CategoryResource($result);
    }

    public function updateCategoryById(int $id, array $data)
    {
        $result = $this->categoryRepo->updateCategoryById($id, $data);

        return new CategoryResource($result);
    }

    public function destroyCategoryById(int $id): bool
    {
        $result = $this->categoryRepo->deleteCategoryById($id);

        return true;
    }

    // public function getCategoryByTitle(string $title)
    // {
    //     $result = $this->categoryRepo->getCategoryByTitle($title);

    //     return new CategoryResource($result);
    // }

    public function getCategoryByCategory(string $Category)
    {
        $result = $this->categoryRepo->getCategoryByCategory($Category);

        return new CategoryCollection($result);
    }

    // public function getCategoryByPublisher(string $publisher)
    // {
    //     $result = $this->categoryRepo->getCategoryByPublisher($publisher);

    //     return new CategoryResource($result);
    // }

    public function searchCategory(string $key, string $value)
    {
        $result = $this->categoryRepo->searchCategory($key, $value);

        return new CategoryResource($result);
    }
}
