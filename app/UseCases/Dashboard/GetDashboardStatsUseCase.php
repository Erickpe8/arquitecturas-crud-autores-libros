<?php

namespace App\UseCases\Dashboard;

use App\DTOs\DashboardStatsDto;
use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Interfaces\Repositories\BookRepositoryInterface;

final class GetDashboardStatsUseCase
{
    public function __construct(
        private readonly AuthorRepositoryInterface $authors,
        private readonly BookRepositoryInterface $books,
    ) {}

    public function execute(): DashboardStatsDto
    {
        return new DashboardStatsDto(
            totalAutores: $this->authors->countAll(),
            totalLibros: $this->books->countAll(),
            generoMasRegistrado: $this->books->mostRegisteredGenreName(),
        );
    }
}
