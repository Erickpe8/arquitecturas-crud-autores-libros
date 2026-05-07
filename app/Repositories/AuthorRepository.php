<?php

namespace App\Repositories;

use App\Models\Autor;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function countAll(): int
    {
        return Autor::count();
    }

    public function paginateWithSearch(?string $search): LengthAwarePaginator
    {
        return Autor::withCount('libros')
            ->when($search, fn ($query) => $query->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate(24)
            ->withQueryString();
    }

    public function create(array $data): Autor
    {
        return Autor::create($data);
    }

    public function loadForShow(Autor $author): Autor
    {
        $author->load(['libros' => fn ($query) => $query->latest('fecha_publicacion')]);

        return $author;
    }

    public function update(Autor $author, array $data): Autor
    {
        $author->update($data);

        return $author;
    }

    public function delete(Autor $author): void
    {
        $author->delete();
    }
}
