<?php

namespace App\Application\Libro\Commands;

use App\Domain\Contracts\LibroRepositoryInterface;

class UpdateLibro
{
    protected LibroRepositoryInterface $libroRepository;

    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    public function execute(int $id, array $data)
    {
        return $this->libroRepository->update($id, $data);
    }
}
