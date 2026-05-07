<?php

namespace App\Handlers\Authors;

use App\Models\Libro;
use App\Queries\Authors\GetAuthorBooksQuery;
use Illuminate\Database\Eloquent\Collection;

final class GetAuthorBooksQueryHandler
{
    public function handle(GetAuthorBooksQuery $query): Collection
    {
        return Libro::query()
            ->where('autor_id', $query->authorId)
            ->latest('fecha_publicacion')
            ->get();
    }
}
