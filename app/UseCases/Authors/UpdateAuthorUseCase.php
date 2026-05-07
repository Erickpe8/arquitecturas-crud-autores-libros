<?php

namespace App\UseCases\Authors;

use App\DTOs\AuthorWriteDto;
use App\Entities\Author;
use App\Interfaces\Repositories\AuthorRepositoryInterface;

final class UpdateAuthorUseCase
{
    public function __construct(private readonly AuthorRepositoryInterface $authors) {}

    public function execute(int $id, AuthorWriteDto $dto): Author
    {
        return $this->authors->update($id, $dto);
    }
}
