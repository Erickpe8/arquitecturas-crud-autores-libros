<?php

namespace App\Services;

use App\Models\Autor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorService
{
    public function countAll(): int
    {
        return Autor::count();
    }

    public function index(?string $search): LengthAwarePaginator
    {
        return Autor::withCount('libros')
            ->when($search, fn ($query) => $query->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate(24)
            ->withQueryString();
    }

    public function store(array $data): Autor
    {
        return Autor::create($data);
    }

    public function show(Autor $autor): Autor
    {
        $autor->load(['libros' => fn ($query) => $query->latest('fecha_publicacion')]);

        return $autor;
    }

    public function update(Autor $autor, array $data): Autor
    {
        $autor->update($data);

        return $autor;
    }

    public function destroy(Autor $autor): void
    {
        $autor->delete();
    }

    public function storeRules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:120'],
            'nacionalidad' => ['nullable', 'string', 'max:120'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'biografia' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function updateRules(): array
    {
        return $this->storeRules();
    }
}
