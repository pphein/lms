<?php

namespace App\Services;

use App\Contracts\Services\EditionServiceInterface;
use App\Contracts\Repositories\EditionRepositoryInterface;

class EditionService implements EditionServiceInterface
{
    public function __construct(
        private EditionRepositoryInterface $edition
    ) {
    }
}
