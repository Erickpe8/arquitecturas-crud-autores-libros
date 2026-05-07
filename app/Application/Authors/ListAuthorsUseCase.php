<?php

namespace App\Application\Authors;

use App\Core\Pagination\PaginatedResult;
use App\Core\Ports\Outbound\AuthorRepositoryPort;

final class ListAuthorsUseCase
{
    public function __construct(private readonly AuthorRepositoryPort $authors) {}

    public function execute(?string $search): PaginatedResult
    {
        return $this->authors->paginateWithSearch($search);
    }
}
