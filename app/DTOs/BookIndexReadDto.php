<?php

namespace App\DTOs;

use App\DTOs\Pagination\PageResult;

final readonly class BookIndexReadDto
{
    /**
     * @param  list<string>  $generos
     */
    public function __construct(
        public PageResult $booksPage,
        public array $generos,
    ) {}
}
