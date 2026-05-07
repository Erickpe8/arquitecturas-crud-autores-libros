<?php

namespace App\DTOs;

final readonly class DashboardStatsDto
{
    public function __construct(
        public int $totalAutores,
        public int $totalLibros,
        public ?string $generoMasRegistrado,
    ) {}
}
