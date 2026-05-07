<?php

namespace App\Handlers\Authors;

use App\Models\Autor;
use App\Queries\Authors\GetAuthorsQuery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class GetAuthorsQueryHandler
{
    public function handle(GetAuthorsQuery $query): LengthAwarePaginator
    {
        $search = $query->search;

        return Autor::withCount('libros')
            ->when($search, fn ($q) => $q->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate(24)
            ->withQueryString();
    }
}
