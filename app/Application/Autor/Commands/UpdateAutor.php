<?php

namespace App\Application\Autor\Commands;

use App\Domain\Contracts\AutorRepositoryInterface;

class UpdateAutor
{
    protected AutorRepositoryInterface $AutorRepository;

    public function __construct(AutorRepositoryInterface $AutorRepository)
    {
        $this->AutorRepository = $AutorRepository;
    }

    public function execute(int $id, array $data)
    {
        return $this->AutorRepository->update($id, $data);
    }
}
