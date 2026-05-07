<?php

namespace App\DTOs;

final readonly class AuthorWriteDto
{
    public function __construct(
        public string $nombre,
        public ?string $nacionalidad,
        public ?string $fecha_nacimiento,
        public ?string $biografia,
    ) {}
}
