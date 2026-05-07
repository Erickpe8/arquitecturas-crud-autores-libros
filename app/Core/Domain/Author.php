<?php

namespace App\Core\Domain;

final class Author
{
    /**
     * @param  list<Book>|null  $libros
     */
    public function __construct(
        public readonly int $id,
        public readonly string $nombre,
        public readonly ?string $nacionalidad,
        public readonly ?string $fecha_nacimiento,
        public readonly ?string $biografia,
        private readonly ?int $librosCount = null,
        private readonly ?array $libros = null,
    ) {}

    /**
     * Compatibilidad con vistas ($autor->libros_count).
     */
    public function __get(string $name): mixed
    {
        return match ($name) {
            'libros_count' => $this->librosCount,
            'libros' => $this->libros ?? [],
            default => throw new \InvalidArgumentException("Propiedad no expuesta: {$name}"),
        };
    }
}
