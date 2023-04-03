<?php

namespace App\Repositories;

use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Models\Role;

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
}
