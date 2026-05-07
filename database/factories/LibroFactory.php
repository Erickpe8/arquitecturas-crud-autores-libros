<?php

namespace Database\Factories;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = fake()->sentence(3);

        return [
            'titulo' => $titulo,
            'descripcion' => fake()->paragraph(4),
            'fecha_publicacion' => fake()->date(),
            'genero' => fake()->randomElement(['Novela', 'Ciencia Ficcion', 'Historia', 'Fantasia', 'Drama', 'Tecnologia']),
            'isbn' => strtoupper(fake()->bothify('ISBN-##########')),
            'portada' => null,
            'autor_id' => Autor::factory(),
        ];
    }
}
