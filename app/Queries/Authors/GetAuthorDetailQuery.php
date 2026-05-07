<?php

namespace App\Queries\Authors;

final readonly class GetAuthorDetailQuery
{
    public function __construct(public int $authorId) {}
}
