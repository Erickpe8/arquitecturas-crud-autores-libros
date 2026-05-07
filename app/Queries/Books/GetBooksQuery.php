<?php

namespace App\Queries\Books;

final readonly class GetBooksQuery
{
    public function __construct(
        public ?string $search = null,
        public ?string $genre = null,
    ) {}
}
