<?php

namespace App\Application\Authors;

use App\Core\Ports\Outbound\AuthorRepositoryPort;

final class DeleteAuthorUseCase
{
    public function __construct(private readonly AuthorRepositoryPort $authors) {}

    public function execute(int $id): void
    {
        $this->authors->delete($id);
    }
}
