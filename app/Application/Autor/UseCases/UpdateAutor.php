<?php

namespace App\Application\Autor\UseCases;

use App\Domain\Autor\Ports\AutorRepositoryInterface;

class UpdateAutor
{
    protected AutorRepositoryInterface $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function execute(int $id, array $data)
    {
        return $this->autorRepository->update($id, $data);
    }
}
