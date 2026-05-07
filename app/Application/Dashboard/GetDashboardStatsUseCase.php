<?php

namespace App\Application\Dashboard;

use App\Core\Ports\Outbound\AuthorRepositoryPort;
use App\Core\Ports\Outbound\BookRepositoryPort;

final class GetDashboardStatsUseCase
{
    public function __construct(
        private readonly AuthorRepositoryPort $authors,
        private readonly BookRepositoryPort $books,
    ) {}

    /**
     * @return array{totalAutores: int, totalLibros: int, generoMasRegistrado: ?string}
     */
    public function execute(): array
    {
        return [
            'totalAutores' => $this->authors->countAll(),
            'totalLibros' => $this->books->countAll(),
            'generoMasRegistrado' => $this->books->mostRegisteredGenreName(),
        ];
    }
}
