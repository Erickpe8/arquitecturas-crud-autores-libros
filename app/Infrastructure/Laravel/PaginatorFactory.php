<?php

namespace App\Infrastructure\Laravel;

use App\Core\Pagination\PaginatedResult;
use Illuminate\Pagination\LengthAwarePaginator;

final class PaginatorFactory
{
    public static function fromResult(PaginatedResult $result): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $result->items,
            $result->total,
            $result->perPage,
            $result->currentPage,
            ['path' => $result->path, 'query' => $result->query]
        );
    }
}
