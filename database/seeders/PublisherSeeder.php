<?php

namespace Database\Seeders;

use Exception;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PublisherSeeder extends Seeder
{
    public function __construct(
        private Publisher $model
    ) {
    }

    public function run(): void
    {
        try {
            $publishers = json_decode(
                file_get_contents(__DIR__ . '/../data/data.json'),
                true
            )['publishers'];
            foreach ($publishers as $publisher) {
                $this->model::firstOrCreate($publisher);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
