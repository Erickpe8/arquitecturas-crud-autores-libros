<?php

namespace App\Domains\Book\Repositories;

use App\Domains\Book\Models\Book;
use App\Domains\Book\Models\Genre;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class BookRepository
{
    public function paginateWithFilters(?string $search, ?string $genre, int $perPage = 24): LengthAwarePaginator
    {
        return Book::with('autor')
            ->when($search, fn ($query) => $query->where('titulo', 'like', "%{$search}%"))
            ->when($genre, fn ($query) => $query->where('genero', $genre))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function allGenres(): Collection
    {
        return Genre::query()->orderBy('nombre')->pluck('nombre');
    }

    public function create(array $data, ?UploadedFile $cover): Book
    {
        if ($cover) {
            $data['portada'] = $cover->store('portadas', 'public');
        }

        return Book::create($data);
    }

    public function update(Book $book, array $data, ?UploadedFile $cover): Book
    {
        if ($cover) {
            $this->deleteCover($book);
            $data['portada'] = $cover->store('portadas', 'public');
        }

        $book->update($data);

        return $book;
    }

    public function delete(Book $book): void
    {
        $this->deleteCover($book);
        $book->delete();
    }

    private function deleteCover(Book $book): void
    {
        if ($book->portada && Storage::disk('public')->exists($book->portada)) {
            Storage::disk('public')->delete($book->portada);
        }
    }
}
