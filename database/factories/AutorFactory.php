<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'nacionalidad' => fake()->randomElement(['Colombiana', 'Mexicana', 'Argentina', 'Española', 'Chilena']),
            'fecha_nacimiento' => fake()->date(),
            'biografia' => fake()->paragraph(3),
        ];
    }
}
