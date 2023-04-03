<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    protected $depends = [
        RoleSeeder::class
    ];

    public function __construct(
        private User $model,
        private Role $role
    ) {
    }

    public function run(): void
    {
        $users = json_decode(
            file_get_contents(__DIR__ . '/../data/users.json'),
            true
        );

        foreach ($users as $user) {
            $data = [
                "name" => $user['name'],
                "email" => $user['email'],
                "password" => $user['password'],
                "role" => $this->role->where('identifier', $user['role'])->first()?->id
            ];
            $this->model::firstOrCreate($data);
        }
    }
}
