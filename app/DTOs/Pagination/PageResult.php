<?php

namespace App\DTOs\Pagination;

final readonly class PageResult
{
    /**
     * @param  array<int, object>  $items
     * @param  array<string, mixed>  $query
     */
    public function __construct(
        public array $items,
        public int $total,
        public int $perPage,
        public int $currentPage,
        public string $path,
        public array $query = [],
    ) {}
}
