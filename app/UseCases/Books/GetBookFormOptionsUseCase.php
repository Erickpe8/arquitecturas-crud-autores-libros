<?php

namespace App\UseCases\Books;

use App\Interfaces\Repositories\BookRepositoryInterface;

final class GetBookFormOptionsUseCase
{
    public function __construct(private readonly BookRepositoryInterface $books) {}

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
