<?php

namespace App\Interfaces\Repositories;

use App\DTOs\AuthorWriteDto;
use App\DTOs\Pagination\PageResult;
use App\Entities\Author;

interface AuthorRepositoryInterface
{
    public function paginateWithSearch(?string $search): PageResult;

    public function create(AuthorWriteDto $dto): Author;

    public function find(int $id): ?Author;

    public function findWithBooks(int $id): ?Author;

    public function update(int $id, AuthorWriteDto $dto): Author;

    public function delete(int $id): void;

    public function countAll(): int;
}
