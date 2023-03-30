<?php

namespace Database\Seeders;

use Exception;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class AuthorSeeder extends Seeder
{
    public function __construct(
        private Author $model
    ) {
    }

    public function run(): void
    {
        try {
            $authors = json_decode(
                file_get_contents(__DIR__ . '/../data/data.json'),
                true
            )['authors'];
            foreach ($authors as $author) {
                $this->model::firstOrCreate($author);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
