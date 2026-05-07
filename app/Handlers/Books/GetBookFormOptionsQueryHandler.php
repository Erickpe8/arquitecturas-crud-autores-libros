<?php

namespace App\Handlers\Books;

use App\Models\Autor;
use App\Models\Genero;
use App\Queries\Books\GetBookFormOptionsQuery;

final class GetBookFormOptionsQueryHandler
{
    /**
     * @return array{autores: \Illuminate\Support\Collection, generos: \Illuminate\Support\Collection}
     */
    public function handle(GetBookFormOptionsQuery $query): array
    {
        return [
            'autores' => Autor::orderBy('nombre')->pluck('nombre', 'id'),
            'generos' => Genero::orderBy('nombre')->pluck('nombre'),
        ];
    }
}
