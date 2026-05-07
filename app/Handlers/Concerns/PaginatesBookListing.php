<?php

namespace App\Handlers\Concerns;

use App\Models\Libro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait PaginatesBookListing
{
    protected function paginateBooks(?string $search, ?string $genre): LengthAwarePaginator
    {
        return Libro::with('autor')
            ->when($search, fn ($query) => $query->where('titulo', 'like', "%{$search}%"))
            ->when($genre, fn ($query) => $query->where('genero', $genre))
            ->latest()
            ->paginate(24)
            ->withQueryString();
    }
}
