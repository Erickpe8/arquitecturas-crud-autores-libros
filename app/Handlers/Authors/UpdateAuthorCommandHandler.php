<?php

namespace App\Handlers\Authors;

use App\Commands\Authors\UpdateAuthorCommand;
use App\Models\Autor;

final class UpdateAuthorCommandHandler
{
    public function handle(UpdateAuthorCommand $command): Autor
    {
        $author = Autor::findOrFail($command->authorId);
        $author->update([
            'nombre' => $command->nombre,
            'nacionalidad' => $command->nacionalidad,
            'fecha_nacimiento' => $command->fecha_nacimiento,
            'biografia' => $command->biografia,
        ]);

        return $author->fresh();
    }
}
