<?php

namespace App\Repositories;

use App\Models\Role;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Log;

class RoleRepository implements RoleRepositoryInterface
{
    public function __construct(
        private Role $model
    ) {
    }

    public function getList()
    {
        return $this->model::get();
    }

    public function getRoleById(int $id)
    {
        return $this->model::where('status', StatusEnum::ACTIVE->value)->findOrFail($id);
    }

    public function createRole(array $data)
    {
        $attributes = [
            'name' => $data['name']
        ];
        $data['status'] = StatusEnum::ACTIVE->value;
        $role = $this->model::updateOrCreate($attributes, $data);

        return $role;
    }

    public function updateRoleById(int $id, array $data)
    {
        Log::info("Update Data >> " . print_r($data, true));

        $this->model::findOrFail($id)->update($data);
        $role = $this->model::findOrFail($id)->refresh();

        return $role;
    }

    public function deleteRoleById(int $id)
    {
        $result = $this->model::findOrFail($id)->update(['status' => StatusEnum::DELETED->value]);
        Log::info("Deleted Role >> " . $result . " Role " . print_r($this->model::findOrFail($id)->toArray(), true));
        return $this->model::findOrFail($id)->refresh();
    }

    public function searchRole(string $key, string $value)
    {
        return $this->model->where($key, $value)->first();
    }
}
