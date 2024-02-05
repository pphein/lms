<?php

namespace App\Services;

use App\Contracts\Services\RoleServiceInterface;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;

class RoleService implements RoleServiceInterface
{
    public function __construct(
        private RoleRepositoryInterface $roleRepo
    ) {
    }

    public function getList()
    {
        $result = $this->roleRepo->getList();

        return new RoleCollection($result);
    }

    public function createRole(array $data)
    {
        $result = $this->roleRepo->createRole($data);

        return new RoleResource($result);
    }

    public function getRoleById(int $id)
    {
        $result = $this->roleRepo->getRoleById($id);

        return new RoleResource($result);
    }

    public function updateRoleById(int $id, array $data)
    {
        $result = $this->roleRepo->updateRoleById($id, $data);

        return new RoleResource($result);
    }

    public function destroyRoleById(int $id): bool
    {
        $result = $this->roleRepo->deleteRoleById($id);

        return true;
    }
}
