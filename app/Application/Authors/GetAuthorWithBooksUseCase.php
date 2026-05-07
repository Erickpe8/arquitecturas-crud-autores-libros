<?php

namespace App\Application\Authors;

use App\Core\Domain\Author;
use App\Core\Ports\Outbound\AuthorRepositoryPort;

final class GetAuthorWithBooksUseCase
{
    public function __construct(private readonly AuthorRepositoryPort $authors) {}

    public function execute(int $id): ?Author
    {
        return $this->authors->findWithBooks($id);
    }
}
