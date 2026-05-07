<?php

namespace App\Application\Books;

use App\Core\Ports\Outbound\BookRepositoryPort;

final class DeleteBookUseCase
{
    public function __construct(private readonly BookRepositoryPort $books) {}

    public function execute(int $id): void
    {
        $this->books->delete($id);
    }
}
