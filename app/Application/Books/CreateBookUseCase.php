<?php

namespace App\Application\Books;

use App\Core\Ports\Outbound\BookRepositoryPort;

final class CreateBookUseCase
{
    public function __construct(private readonly BookRepositoryPort $books) {}

    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, portada?: ?string, autor_id: int}  $data
     */
    public function execute(array $data): void
    {
        $this->books->create($data);
    }
}
