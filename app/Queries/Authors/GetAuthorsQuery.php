<?php

namespace App\Queries\Authors;

final readonly class GetAuthorsQuery
{
    public function __construct(public ?string $search = null) {}
}
