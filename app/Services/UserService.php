<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Contracts\Services\UserServiceInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepo
    ) {
    }

    public function getList()
    {
        $result = $this->userRepo->getList();

        return new UserCollection($result);
    }

    public function createUser(array $data)
    {
        $result = $this->userRepo->createUser($data);

        return new UserResource($result);
    }

    public function getUserById(int $id)
    {
        $result = $this->userRepo->getUserById($id);

        return new UserResource($result);
    }

    public function updateUserById(int $id, array $data)
    {
        $result = $this->userRepo->updateUserById($id, $data);

        return new UserResource($result);
    }

    public function destroyUserById(int $id): bool
    {
        $result = $this->userRepo->deleteUserById($id);

        return true;
    }
}
