<?php

namespace App\Services;

use App\Contracts\Services\PublisherServiceInterface;
use App\Contracts\Repositories\PublisherRepositoryInterface;

class PublisherService implements PublisherServiceInterface
{
    public function __construct(
        private PublisherRepositoryInterface $publisher
    ) {
    }
}
