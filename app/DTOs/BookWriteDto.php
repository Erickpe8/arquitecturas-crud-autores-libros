<?php

namespace App\DTOs;

final readonly class BookWriteDto
{
    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, autor_id: int, portada?: ?string}  $fields
     */
    public function __construct(public array $fields) {}
}
