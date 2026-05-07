<?php

namespace App\UseCases\Authors;

use App\DTOs\Pagination\PageResult;
use App\Interfaces\Repositories\AuthorRepositoryInterface;

final class ListAuthorsUseCase
{
    public function __construct(private readonly AuthorRepositoryInterface $authors) {}

    public function execute(?string $search): PageResult
    {
        return $this->authors->paginateWithSearch($search);
    }
}
