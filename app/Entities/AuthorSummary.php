<?php

namespace App\Entities;

final class AuthorSummary
{
    public function __construct(
        public readonly int $id,
        public readonly string $nombre,
    ) {}
}
