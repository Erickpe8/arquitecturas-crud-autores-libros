<?php

namespace App\Application\Libro\UseCases;

use App\Domain\Libro\Contracts\LibroRepositoryInterface;

class FindLibro
{
    protected LibroRepositoryInterface $libroRepository;

    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    public function execute(int $id)
    {
        return $this->libroRepository->find($id);
    }
}
