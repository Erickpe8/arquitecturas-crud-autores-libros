<?php

namespace App\Commands\Books;

final readonly class DeleteBookCommand
{
    public function __construct(public int $bookId) {}
}
