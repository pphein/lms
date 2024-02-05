<?php

namespace App\Repositories;

use App\Models\User;
use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Log;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private User $model,
        private RoleRepositoryInterface $role
    ) {
    }

    public function getList()
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->get();
    }

    public function getUserById(int $id)
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->findOrFail($id);
    }

    public function createUser(array $data)
    {
        $attributes = [
            'email' => $data['email']
        ];
        $data['role_id'] = $this->role->createRole(['name' => $data['role']])->id;
        $data['status'] = StatusEnum::ACTIVE->value;
        $user = $this->model::updateOrCreate($attributes, $data);

        return $user;
    }

    public function updateUserById(int $id, array $data)
    {
        $data['role_id'] = $this->role->createRole(['name' => $data['role']])->id;
        Log::info("Update Data >> " . print_r($data, true));
        $this->model::findOrFail($id)->update($data);
        $user = $this->model::findOrFail($id)->refresh();

        return $user;
    }

    public function deleteUserById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => StatusEnum::DELETED->value]);
        Log::info("Deleted user >> " . $result . " user " . print_r($this->model::findOrFail($id)->toArray(), true));
        return $this->model::findOrFail($id)->refresh();
    }
}
