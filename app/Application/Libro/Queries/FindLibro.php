<?php

namespace App\Application\Libro\Queries;

use App\Domain\Contracts\LibroRepositoryInterface;

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
