<?php

namespace App\UseCases\Books;

use App\Entities\Book;
use App\Interfaces\Repositories\BookRepositoryInterface;

final class ShowBookUseCase
{
    public function __construct(private readonly BookRepositoryInterface $books) {}

    public function execute(int $id): ?Book
    {
        return $this->books->findWithAuthor($id);
    }
}
