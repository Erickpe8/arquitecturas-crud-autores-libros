<?php

namespace App\Application\Autor\UseCases;

use App\Domain\Contracts\AutorRepositoryInterface;

class CreateAutor
{
    protected AutorRepositoryInterface $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function execute(array $data)
    {
        return $this->autorRepository->create($data);
    }
}
