<?php

namespace App\Application\Libro\UseCases;

use App\Domain\Libro\Ports\LibroRepositoryInterface;

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
