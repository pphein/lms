<?php

namespace Database\Seeders;

use Exception;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CategorySeeder extends Seeder
{
    public function __construct(
        private Category $model
    ) {
    }

    public function run(): void
    {
        try {
            $categorys = json_decode(
                file_get_contents(__DIR__ . '/../data/data.json'),
                true
            )['categories'];
            foreach ($categorys as $category) {
                $this->model::firstOrCreate($category);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
