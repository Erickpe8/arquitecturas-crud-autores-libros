<?php

namespace App\Queries\Authors;

final readonly class GetAuthorBooksQuery
{
    public function __construct(public int $authorId) {}
}
