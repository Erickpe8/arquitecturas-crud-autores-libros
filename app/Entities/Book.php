<?php

namespace App\Entities;

final class Book
{
    public function __construct(
        public readonly int $id,
        public readonly string $titulo,
        public readonly ?string $descripcion,
        public readonly ?string $fecha_publicacion,
        public readonly ?string $genero,
        public readonly string $isbn,
        public readonly ?string $portada,
        public readonly int $autor_id,
        public readonly ?AuthorSummary $autor = null,
    ) {}

    public function portadaUrl(): string
    {
        return BookCover::resolve($this->portada, $this->titulo);
    }

    public function __get(string $name): mixed
    {
        return match ($name) {
            'portada_url' => $this->portadaUrl(),
            default => throw new \InvalidArgumentException("Propiedad no disponible en vista: {$name}"),
        };
    }
}
