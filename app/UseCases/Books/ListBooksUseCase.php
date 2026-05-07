<?php

namespace App\UseCases\Books;

use App\DTOs\BookIndexReadDto;
use App\Interfaces\Repositories\BookRepositoryInterface;

final class ListBooksUseCase
{
    public function __construct(private readonly BookRepositoryInterface $books) {}

    public function execute(?string $search, ?string $genre): BookIndexReadDto
    {
        $page = $this->books->paginateWithFilters($search, $genre);

        return new BookIndexReadDto(
            booksPage: $page,
            generos: $this->books->listGenreNames(),
        );
    }
}
