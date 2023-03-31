<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\AuthorService;
use App\Services\StatusService;
use App\Services\EditionService;
use App\Services\CategoryService;
use App\Services\PublisherService;
use App\Repositories\BookRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\StatusRepository;
use App\Repositories\EditionRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\PublisherRepository;
use App\Contracts\Services\BookServiceInterface;
use App\Contracts\Services\RoleServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Contracts\Services\AuthorServiceInterface;
use App\Contracts\Services\StatusServiceInterface;
use App\Contracts\Services\EditionServiceInterface;
use App\Contracts\Services\CategoryServiceInterface;
use App\Contracts\Services\PublisherServiceInterface;
use App\Contracts\Repositories\BookRepositoryInterface;
use App\Contracts\Repositories\RoleRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\AuthorRepositoryInterface;
use App\Contracts\Repositories\StatusRepositoryInterface;
use App\Contracts\Repositories\EditionRepositoryInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\PublisherRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorServiceInterface::class, AuthorService::class);
        $this->app->bind(BookServiceInterface::class, BookService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(EditionServiceInterface::class, EditionService::class);
        $this->app->bind(PublisherServiceInterface::class, PublisherService::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(StatusServiceInterface::class, StatusService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(EditionRepositoryInterface::class, EditionRepository::class);
        $this->app->bind(PublisherRepositoryInterface::class, PublisherRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
