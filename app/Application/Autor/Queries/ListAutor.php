<?php

namespace App\Application\Autor\Queries;

use App\Domain\Contracts\AutorRepositoryInterface;
class ListAutor
{
    protected AutorRepositoryInterface $AutorRepository;

    public function __construct(AutorRepositoryInterface $AutorRepository)
    {
        $this->AutorRepository = $AutorRepository;
    }

    public function execute()
    {
        return $this->AutorRepository->all();
    }
}
