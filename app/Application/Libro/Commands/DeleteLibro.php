<?php

namespace App\Application\Libro\Commands;

use App\Domain\Contracts\LibroRepositoryInterface;

class DeleteLibro
{
    protected LibroRepositoryInterface $libroRepository;

    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    public function execute(int $id)
    {
        return $this->libroRepository->delete($id);
    }
}
