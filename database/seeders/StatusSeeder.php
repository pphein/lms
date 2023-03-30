<?php

namespace Database\Seeders;

use Exception;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class StatusSeeder extends Seeder
{
    public function __construct(
        private Status $model
    ) {
    }

    public function run(): void
    {
        try {
            $statuses = json_decode(
                file_get_contents(__DIR__ . '/../data/statuses.json'),
                true
            );
            foreach ($statuses as $status) {
                $this->model::firstOrCreate($status);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
