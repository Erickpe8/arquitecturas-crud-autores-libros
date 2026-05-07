<?php

namespace App\Core\Domain;

final class AuthorSummary
{
    public function __construct(
        public readonly int $id,
        public readonly string $nombre,
    ) {}
}
