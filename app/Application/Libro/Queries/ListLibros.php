<?php

namespace App\Application\Libro\Queries;

use App\Domain\Contracts\LibroRepositoryInterface;
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
