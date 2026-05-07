<?php

namespace App\Interfaces\Repositories;

use App\DTOs\BookWriteDto;
use App\DTOs\Pagination\PageResult;
use App\Entities\Book;

interface BookRepositoryInterface
{
    public function paginateWithFilters(?string $search, ?string $genre): PageResult;

    /** @return list<string> */
    public function listGenreNames(): array;

    /** @return array<int, string> */
    public function listAuthorsForSelect(): array;

    public function create(BookWriteDto $dto): void;

    public function findWithAuthor(int $id): ?Book;

    public function update(int $id, BookWriteDto $dto): Book;

    public function delete(int $id): void;

    public function countAll(): int;

    public function mostRegisteredGenreName(): ?string;
}
