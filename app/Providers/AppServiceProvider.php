<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use App\Repositories\Eloquent\AutorRepository;
use App\Repositories\Interfaces\LibroRepositoryInterface;
use App\Repositories\Eloquent\LibroRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(AutorRepositoryInterface::class, AutorRepository::class);
        $this->app->bind(LibroRepositoryInterface::class, LibroRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
