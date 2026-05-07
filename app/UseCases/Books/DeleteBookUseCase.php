<?php

namespace App\UseCases\Books;

use App\Interfaces\Repositories\BookRepositoryInterface;

final class DeleteBookUseCase
{
    public function __construct(private readonly BookRepositoryInterface $books) {}

    public function execute(int $id): void
    {
        $this->books->delete($id);
    }
}
