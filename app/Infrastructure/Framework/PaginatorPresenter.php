<?php

namespace App\Infrastructure\Framework;

use App\DTOs\Pagination\PageResult;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Adaptador framework: convierte el modelo de paginación del dominio a Laravel.
 */
final class PaginatorPresenter
{
    public static function fromPageResult(PageResult $page): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $page->items,
            $page->total,
            $page->perPage,
            $page->currentPage,
            ['path' => $page->path, 'query' => $page->query]
        );
    }
}
