<?php

namespace App\Handlers\Authors;

use App\Commands\Authors\DeleteAuthorCommand;
use App\Models\Autor;

final class DeleteAuthorCommandHandler
{
    public function handle(DeleteAuthorCommand $command): void
    {
        $author = Autor::findOrFail($command->authorId);
        $author->delete();
    }
}
