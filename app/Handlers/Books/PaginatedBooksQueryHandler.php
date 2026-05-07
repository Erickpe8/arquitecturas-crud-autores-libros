<?php

namespace App\Handlers\Books;

use App\Handlers\Concerns\PaginatesBookListing;
use App\Queries\Books\GetBooksQuery;
use App\Queries\Books\SearchBooksQuery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Lectura paginada de libros (listado / filtros).
 * Acepta GetBooksQuery o SearchBooksQuery según el caso de uso de lectura.
 */
final class PaginatedBooksQueryHandler
{
    use PaginatesBookListing;

    public function handle(GetBooksQuery|SearchBooksQuery $query): LengthAwarePaginator
    {
        return $this->paginateBooks($query->search, $query->genre);
    }
}
