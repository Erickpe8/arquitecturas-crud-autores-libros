<?php

namespace App\Application\Books;

use App\Core\Ports\Outbound\BookRepositoryPort;

final class UpdateBookUseCase
{
    public function __construct(private readonly BookRepositoryPort $books) {}

    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, autor_id: int, portada?: ?string}  $data
     */
    public function execute(int $id, array $data): void
    {
        $this->books->update($id, $data);
    }
}
