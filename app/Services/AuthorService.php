<?php

namespace App\Services;

use App\Contracts\Services\AuthorServiceInterface;
use App\Contracts\Repositories\AuthorRepositoryInterface;

class AuthorService implements AuthorServiceInterface
{
    public function __construct(
        private AuthorRepositoryInterface $author
    ) {
    }
}
