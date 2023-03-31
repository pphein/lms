<?php

namespace App\Services;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Contracts\Services\BookServiceInterface;

class BookService implements BookServiceInterface
{
    public function __construct(
        private BookRepositoryInterface $book
    ) {
    }
}
