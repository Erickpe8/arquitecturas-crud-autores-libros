<?php

namespace App\Commands\Authors;

final readonly class CreateAuthorCommand
{
    public function __construct(
        public string $nombre,
        public ?string $nacionalidad,
        public ?string $fecha_nacimiento,
        public ?string $biografia,
    ) {}
}
