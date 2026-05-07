<?php

namespace App\Handlers\Dashboard;

use App\Models\Autor;
use App\Models\Libro;
use App\Queries\Dashboard\GetDashboardStatsQuery;

final class GetDashboardStatsQueryHandler
{
    /**
     * @return array{totalAutores: int, totalLibros: int, generoMasRegistrado: ?string}
     */
    public function handle(GetDashboardStatsQuery $query): array
    {
        return [
            'totalAutores' => Autor::count(),
            'totalLibros' => Libro::count(),
            'generoMasRegistrado' => Libro::query()
                ->select('genero')
                ->whereNotNull('genero')
                ->where('genero', '!=', '')
                ->groupBy('genero')
                ->orderByRaw('COUNT(*) DESC')
                ->value('genero'),
        ];
    }
}
