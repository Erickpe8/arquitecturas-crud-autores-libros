<?php

namespace App\Entities;

final class Author
{
    /**
     * @param  list<Book>|null  $books
     */
    public function __construct(
        public readonly int $id,
        public readonly string $nombre,
        public readonly ?string $nacionalidad,
        public readonly ?string $fecha_nacimiento,
        public readonly ?string $biografia,
        private readonly ?int $librosCount = null,
        private readonly ?array $books = null,
    ) {}

    public function __get(string $name): mixed
    {
        return match ($name) {
            'libros_count' => $this->librosCount,
            'libros' => $this->books ?? [],
            default => throw new \InvalidArgumentException("Propiedad no disponible en vista: {$name}"),
        };
    }
}
