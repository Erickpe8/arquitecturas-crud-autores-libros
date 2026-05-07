<?php

namespace App\UseCases\Books;

use App\DTOs\BookWriteDto;
use App\Interfaces\Repositories\BookRepositoryInterface;

final class CreateBookUseCase
{
    public function __construct(private readonly BookRepositoryInterface $books) {}

    public function execute(BookWriteDto $dto): void
    {
        $this->books->create($dto);
    }
}
