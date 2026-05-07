<?php

namespace App\Repositories\Interfaces;

use App\Models\Autor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AuthorRepositoryInterface
{
    public function paginateWithSearch(?string $search): LengthAwarePaginator;

    public function create(array $data): Autor;

    public function loadForShow(Autor $author): Autor;

    public function update(Autor $author, array $data): Autor;

    public function delete(Autor $author): void;
}
