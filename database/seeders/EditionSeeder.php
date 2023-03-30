<?php

namespace Database\Seeders;

use Exception;
use App\Models\Edition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class EditionSeeder extends Seeder
{
    public function __construct(
        private Edition $model
    ) {
    }

    public function run(): void
    {
        try {
            $editions = json_decode(
                file_get_contents(__DIR__ . '/../data/editions.json'),
                true
            );
            foreach ($editions as $edition) {
                $this->model::firstOrCreate($edition);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
