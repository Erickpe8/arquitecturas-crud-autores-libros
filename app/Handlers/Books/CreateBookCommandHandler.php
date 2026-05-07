<?php

namespace App\Handlers\Books;

use App\Commands\Books\CreateBookCommand;
use App\Models\Libro;

final class CreateBookCommandHandler
{
    public function handle(CreateBookCommand $command): void
    {
        Libro::create($command->payload);
    }
}
