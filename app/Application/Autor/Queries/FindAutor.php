<?php

namespace App\Application\Autor\Queries;

use App\Domain\Contracts\AutorRepositoryInterface;

class FindAutor
{
    protected AutorRepositoryInterface $AutorRepository;

    public function __construct(AutorRepositoryInterface $AutorRepository)
    {
        $this->AutorRepository = $AutorRepository;
    }

    public function execute(int $id)
    {
        return $this->AutorRepository->find($id);
    }
}
