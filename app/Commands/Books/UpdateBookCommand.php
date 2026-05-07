<?php

namespace App\Commands\Books;

final readonly class UpdateBookCommand
{
    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, autor_id: int, portada?: ?string}  $payload
     */
    public function __construct(
        public int $bookId,
        public array $payload,
    ) {}
}
