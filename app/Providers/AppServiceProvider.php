<?php

namespace App\Providers;

use App\Infrastructure\Persistence\EloquentAuthorRepository;
use App\Infrastructure\Persistence\EloquentBookRepository;
use App\Infrastructure\Storage\LaravelCoverStorage;
use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Interfaces\Storage\CoverStorageInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepositoryInterface::class, EloquentAuthorRepository::class);
        $this->app->bind(BookRepositoryInterface::class, EloquentBookRepository::class);
        $this->app->bind(CoverStorageInterface::class, LaravelCoverStorage::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
