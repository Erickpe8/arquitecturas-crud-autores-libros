<?php

namespace App\UseCases\Books;

use App\DTOs\BookWriteDto;
use App\Entities\Book;
use App\Interfaces\Repositories\BookRepositoryInterface;

final class UpdateBookUseCase
{
    public function __construct(private readonly BookRepositoryInterface $books) {}

    public function execute(int $id, BookWriteDto $dto): Book
    {
        return $this->books->update($id, $dto);
    }
}
