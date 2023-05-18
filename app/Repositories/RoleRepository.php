<?php

namespace App\Repositories;

use App\Models\Role;
use App\Contracts\Repositories\RoleRepositoryInterface;

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
