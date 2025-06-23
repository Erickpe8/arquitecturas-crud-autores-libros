<?php

namespace App\Application\Libro\UseCases;

use App\Domain\Libro\Repositories\LibroRepositoryInterface;

class CreateLibro
{
    protected LibroRepositoryInterface $libroRepository;

    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    public function execute(array $data)
    {
        return $this->libroRepository->create($data);
    }
}
