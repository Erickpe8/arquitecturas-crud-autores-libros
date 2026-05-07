<?php

namespace App\Handlers\Authors;

use App\Commands\Authors\CreateAuthorCommand;
use App\Models\Autor;

final class CreateAuthorCommandHandler
{
    public function handle(CreateAuthorCommand $command): void
    {
        Autor::create([
            'nombre' => $command->nombre,
            'nacionalidad' => $command->nacionalidad,
            'fecha_nacimiento' => $command->fecha_nacimiento,
            'biografia' => $command->biografia,
        ]);
    }
}
