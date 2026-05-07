<?php

namespace App\Handlers\Books;

use App\Models\Libro;
use App\Queries\Books\GetBookDetailQuery;

final class GetBookDetailQueryHandler
{
    public function handle(GetBookDetailQuery $query): Libro
    {
        $libro = Libro::with('autor')->findOrFail($query->bookId);

        return $libro;
    }
}
