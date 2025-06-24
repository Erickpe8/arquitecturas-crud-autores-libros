<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Repositorio de autores
use App\Domain\Autor\Contracts\AutorRepositoryInterface;
use App\Infrastructure\Adapters\Persistence\EloquentAutorRepository;

// Repositorio de libros
use App\Domain\Libro\Contracts\LibroRepositoryInterface;
use App\Infrastructure\Adapters\Persistence\EloquentLibroRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra los servicios del contenedor.
     */
    public function register(): void
    {
        // Binding del repositorio de autores
        $this->app->bind(
            AutorRepositoryInterface::class,
            EloquentAutorRepository::class
        );

        // Binding del repositorio de libros
        $this->app->bind(
            LibroRepositoryInterface::class,
            EloquentLibroRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
