<?php

namespace App\Application\Libro\UseCases;

use App\Domain\Libro\Contracts\LibroRepositoryInterface;
class ListLibros
{
    protected LibroRepositoryInterface $libroRepository;

    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    public function execute()
    {
        return $this->libroRepository->all();
    }
}
