<?php

namespace App\Services;

use App\Contracts\Services\StatusServiceInterface;
use App\Contracts\Repositories\StatusRepositoryInterface;

class StatusService implements StatusServiceInterface
{
    public function __construct(
        private StatusRepositoryInterface $status
    ) {
    }
}
