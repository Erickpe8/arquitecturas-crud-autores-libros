<?php

namespace App\Commands\Authors;

final readonly class UpdateAuthorCommand
{
    public function __construct(
        public int $authorId,
        public string $nombre,
        public ?string $nacionalidad,
        public ?string $fecha_nacimiento,
        public ?string $biografia,
    ) {}
}
