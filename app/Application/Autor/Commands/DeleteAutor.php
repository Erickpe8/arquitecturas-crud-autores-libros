<?php

namespace App\Application\Autor\Commands;

use App\Domain\Contracts\AutorRepositoryInterface;

class DeleteAutor
{
    protected AutorRepositoryInterface $AutorRepository;

    public function __construct(AutorRepositoryInterface $AutorRepository)
    {
        $this->AutorRepository = $AutorRepository;
    }

    public function execute(int $id)
    {
        return $this->AutorRepository->delete($id);
    }
}
