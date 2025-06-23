<?php

namespace App\Application\Autor\UseCases;

use App\Domain\Autor\Repositories\AutorRepositoryInterface;

class ListAutores
{
    protected AutorRepositoryInterface $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function execute()
    {
        return $this->autorRepository->all();
    }
}
