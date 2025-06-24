<?php

namespace App\Application\Autor\Commands;

use App\Domain\Contracts\AutorRepositoryInterface;

class CreateAutor
{
    protected AutorRepositoryInterface $AutorRepository;

    public function __construct(AutorRepositoryInterface $AutorRepository)
    {
        $this->AutorRepository = $AutorRepository;
    }

    public function execute(array $data)
    {
        return $this->AutorRepository->create($data);
    }
}
