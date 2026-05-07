<?php

namespace App\UseCases\Authors;

use App\DTOs\AuthorWriteDto;
use App\Interfaces\Repositories\AuthorRepositoryInterface;

final class CreateAuthorUseCase
{
    public function __construct(private readonly AuthorRepositoryInterface $authors) {}

    public function execute(AuthorWriteDto $dto): void
    {
        $this->authors->create($dto);
    }
}
