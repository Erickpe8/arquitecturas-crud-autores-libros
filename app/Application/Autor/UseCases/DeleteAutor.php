<?php

namespace App\Application\Autor\UseCases;

use App\Domain\Autor\Ports\AutorRepositoryInterface;

class DeleteAutor
{
    protected AutorRepositoryInterface $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function execute(int $id)
    {
        return $this->autorRepository->delete($id);
    }
}
