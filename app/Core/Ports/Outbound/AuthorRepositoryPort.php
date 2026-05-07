<?php

namespace App\Core\Ports\Outbound;

use App\Core\Domain\Author;
use App\Core\Pagination\PaginatedResult;

interface AuthorRepositoryPort
{
    public function paginateWithSearch(?string $search): PaginatedResult;

    /**
     * @param  array{nombre: string, nacionalidad?: ?string, fecha_nacimiento?: ?string, biografia?: ?string}  $data
     */
    public function create(array $data): Author;

    public function findWithBooks(int $id): ?Author;

    /**
     * @param  array{nombre: string, nacionalidad?: ?string, fecha_nacimiento?: ?string, biografia?: ?string}  $data
     */
    public function update(int $id, array $data): Author;

    public function delete(int $id): void;

    public function countAll(): int;
}
