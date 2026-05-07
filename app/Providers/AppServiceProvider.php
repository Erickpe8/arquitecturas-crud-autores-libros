<?php

namespace App\Providers;

use App\Core\Ports\Outbound\AuthorRepositoryPort;
use App\Core\Ports\Outbound\BookRepositoryPort;
use App\Core\Ports\Outbound\CoverStoragePort;
use App\Infrastructure\Persistence\Eloquent\EloquentAuthorRepository;
use App\Infrastructure\Persistence\Eloquent\EloquentBookRepository;
use App\Infrastructure\Storage\LaravelCoverStorageAdapter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepositoryPort::class, EloquentAuthorRepository::class);
        $this->app->bind(BookRepositoryPort::class, EloquentBookRepository::class);
        $this->app->bind(CoverStoragePort::class, LaravelCoverStorageAdapter::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
