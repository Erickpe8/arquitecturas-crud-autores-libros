<?php

namespace App\Core\Ports\Outbound;

use App\Core\Domain\Book;
use App\Core\Pagination\PaginatedResult;

interface BookRepositoryPort
{
    public function paginateWithFilters(?string $search, ?string $genre): PaginatedResult;

    /** @return list<string> */
    public function listGenreNames(): array;

    /** @return array<int, string> id => nombre autor */
    public function listAuthorsForSelect(): array;

    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, portada?: ?string, autor_id: int}  $data
     */
    public function create(array $data): void;

    public function findWithAuthor(int $id): ?Book;

    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, autor_id: int, portada?: ?string}  $data
     */
    public function update(int $id, array $data): void;

    public function delete(int $id): void;

    public function countAll(): int;

    public function mostRegisteredGenreName(): ?string;
}
