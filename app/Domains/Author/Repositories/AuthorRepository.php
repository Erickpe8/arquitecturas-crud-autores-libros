<?php

namespace App\Domains\Author\Repositories;

use App\Domains\Author\Models\Author;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorRepository
{
    public function paginateWithSearch(?string $search, int $perPage = 24): LengthAwarePaginator
    {
        return Author::withCount('libros')
            ->when($search, fn ($query) => $query->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data): Author
    {
        return Author::create($data);
    }

    public function update(Author $author, array $data): Author
    {
        $author->update($data);

        return $author;
    }

    public function delete(Author $author): void
    {
        $author->delete();
    }
}
