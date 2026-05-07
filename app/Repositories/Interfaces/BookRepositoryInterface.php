<?php

namespace App\Repositories\Interfaces;

use App\Models\Libro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function paginateWithFilters(?string $search, ?string $genre): LengthAwarePaginator;

    public function allGenres(): Collection;

    public function allAuthorsForSelect(): Collection;

    public function loadForShow(Libro $book): Libro;

    public function create(array $data, ?UploadedFile $cover): Libro;

    public function update(Libro $book, array $data, ?UploadedFile $cover): Libro;

    public function delete(Libro $book): void;
}
