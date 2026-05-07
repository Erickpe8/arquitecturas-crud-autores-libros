<?php

namespace App\Queries\Books;

final readonly class GetBookDetailQuery
{
    public function __construct(public int $bookId) {}
}
