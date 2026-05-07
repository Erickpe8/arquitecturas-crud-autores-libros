<?php

namespace App\Application\Books;

use App\Core\Pagination\PaginatedResult;
use App\Core\Ports\Outbound\BookRepositoryPort;

final class ListBooksUseCase
{
    public function __construct(private readonly BookRepositoryPort $books) {}

    public function execute(?string $search, ?string $genre): PaginatedResult
    {
        return $this->books->paginateWithFilters($search, $genre);
    }
}
