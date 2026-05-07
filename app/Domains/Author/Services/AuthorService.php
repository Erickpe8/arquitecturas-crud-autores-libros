<?php

namespace App\Domains\Author\Services;

use App\Domains\Author\Models\Author;
use App\Domains\Author\Repositories\AuthorRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AuthorService
{
    public function __construct(private readonly AuthorRepository $authorRepository)
    {
    }

    public function index(?string $search): LengthAwarePaginator
    {
        return $this->authorRepository->paginateWithSearch($search);
    }

    public function show(Author $author): Author
    {
        $author->load(['libros' => fn ($query) => $query->latest('fecha_publicacion')]);

        return $author;
    }

    public function store(array $data): Author
    {
        return $this->authorRepository->create($data);
    }

    public function update(Author $author, array $data): Author
    {
        return $this->authorRepository->update($author, $data);
    }

    public function destroy(Author $author): void
    {
        $this->authorRepository->delete($author);
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:120'],
            'nacionalidad' => ['nullable', 'string', 'max:120'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'biografia' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
