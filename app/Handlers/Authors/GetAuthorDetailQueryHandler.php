<?php

namespace App\Handlers\Authors;

use App\Models\Autor;
use App\Queries\Authors\GetAuthorBooksQuery;
use App\Queries\Authors\GetAuthorDetailQuery;

final class GetAuthorDetailQueryHandler
{
    public function __construct(
        private readonly GetAuthorBooksQueryHandler $authorBooks,
    ) {}

    public function handle(GetAuthorDetailQuery $query): Autor
    {
        $author = Autor::findOrFail($query->authorId);
        $books = $this->authorBooks->handle(new GetAuthorBooksQuery($query->authorId));
        $author->setRelation('libros', $books);

        return $author;
    }
}
