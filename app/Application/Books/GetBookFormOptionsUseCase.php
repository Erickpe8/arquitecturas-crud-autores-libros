<?php

namespace App\Application\Books;

use App\Core\Ports\Outbound\BookRepositoryPort;

final class GetBookFormOptionsUseCase
{
    public function __construct(private readonly BookRepositoryPort $books) {}

    /**
     * @return array{autores: array<int, string>, generos: list<string>}
     */
    public function execute(): array
    {
        return [
            'autores' => $this->books->listAuthorsForSelect(),
            'generos' => $this->books->listGenreNames(),
        ];
    }
}
