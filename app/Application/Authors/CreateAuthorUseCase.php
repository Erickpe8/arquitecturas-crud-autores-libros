<?php

namespace App\Application\Authors;

use App\Core\Domain\Author;
use App\Core\Ports\Outbound\AuthorRepositoryPort;

final class CreateAuthorUseCase
{
    public function __construct(private readonly AuthorRepositoryPort $authors) {}

    /**
     * @param  array{nombre: string, nacionalidad?: ?string, fecha_nacimiento?: ?string, biografia?: ?string}  $data
     */
    public function execute(array $data): Author
    {
        return $this->authors->create($data);
    }
}
