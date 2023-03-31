<?php

namespace App\Services;

use App\Contracts\Services\RoleServiceInterface;
use App\Contracts\Repositories\RoleRepositoryInterface;

class RoleService implements RoleServiceInterface
{
    public function __construct(
        private RoleRepositoryInterface $role
    ) {
    }
}
