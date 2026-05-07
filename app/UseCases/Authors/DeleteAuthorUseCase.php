<?php

namespace App\UseCases\Authors;

use App\Interfaces\Repositories\AuthorRepositoryInterface;

final class DeleteAuthorUseCase
{
    public function __construct(private readonly AuthorRepositoryInterface $authors) {}

    public function execute(int $id): void
    {
        $this->authors->delete($id);
    }
}
