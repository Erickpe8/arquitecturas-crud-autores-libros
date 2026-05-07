<?php

namespace App\UseCases\Authors;

use App\Entities\Author;
use App\Interfaces\Repositories\AuthorRepositoryInterface;

final class ShowAuthorUseCase
{
    public function __construct(private readonly AuthorRepositoryInterface $authors) {}

    public function execute(int $id): ?Author
    {
        return $this->authors->findWithBooks($id);
    }
}
