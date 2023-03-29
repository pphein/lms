<?php

namespace Database\Seeders;

use Exception;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    protected $depends = [
        StatusSeeder::class
    ];

    public function __construct(
        private Role $model
    ) {
    }

    public function run(): void
    {
        try {
            $roles = json_decode(
                file_get_contents(__DIR__ . '/../data/data.json'),
                true
            )['roles'];
            foreach ($roles as $role) {
                $this->model::firstOrCreate($role);
            }
        } catch (Exception $e) {
            Log::error('Error on seeding. Class : ' . $this->model::class . ', Message : ' . $e->getMessage());
        }
    }
}
