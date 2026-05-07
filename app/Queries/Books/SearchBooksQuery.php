<?php

namespace App\Queries\Books;

final readonly class SearchBooksQuery
{
    public function __construct(
        public ?string $search = null,
        public ?string $genre = null,
    ) {}
}
