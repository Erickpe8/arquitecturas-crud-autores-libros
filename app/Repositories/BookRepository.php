<?php

namespace App\Repositories;

use App\Models\Autor;
use App\Models\Genero;
use App\Models\Libro;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class BookRepository implements BookRepositoryInterface
{
    public function paginateWithFilters(?string $search, ?string $genre): LengthAwarePaginator
    {
        return Libro::with('autor')
            ->when($search, fn ($query) => $query->where('titulo', 'like', "%{$search}%"))
            ->when($genre, fn ($query) => $query->where('genero', $genre))
            ->latest()
            ->paginate(24)
            ->withQueryString();
    }

    public function allGenres(): Collection
    {
        return Genero::query()
            ->orderBy('nombre')
            ->pluck('nombre');
    }

    public function allAuthorsForSelect(): Collection
    {
        return Autor::query()
            ->orderBy('nombre')
            ->pluck('nombre', 'id');
    }

    public function loadForShow(Libro $book): Libro
    {
        $book->load('autor');

        return $book;
    }

    public function create(array $data, ?UploadedFile $cover): Libro
    {
        if ($cover) {
            $data['portada'] = $cover->store('portadas', 'public');
        }

        return Libro::create($data);
    }

    public function update(Libro $book, array $data, ?UploadedFile $cover): Libro
    {
        if ($cover) {
            $this->deleteCover($book);
            $data['portada'] = $cover->store('portadas', 'public');
        }

        $book->update($data);

        return $book;
    }

    public function delete(Libro $book): void
    {
        $this->deleteCover($book);
        $book->delete();
    }

    private function deleteCover(Libro $book): void
    {
        if ($book->portada && Storage::disk('public')->exists($book->portada)) {
            Storage::disk('public')->delete($book->portada);
        }
    }
}
