<?php

namespace App\Application\Books;

use App\Core\Domain\Book;
use App\Core\Ports\Outbound\BookRepositoryPort;

final class GetBookUseCase
{
    public function __construct(private readonly BookRepositoryPort $books) {}

    public function execute(int $id): ?Book
    {
        return $this->books->findWithAuthor($id);
    }
}
