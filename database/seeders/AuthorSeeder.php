<?php

namespace Database\Seeders;

use App\Domains\Author\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'nombre' => 'Gabriel Garcia Marquez',
                'nacionalidad' => 'Colombiana',
                'fecha_nacimiento' => '1927-03-06',
                'biografia' => 'Novelista y periodista colombiano, referente del realismo magico y Premio Nobel de Literatura en 1982.',
            ],
            [
                'nombre' => 'Julio Cortazar',
                'nacionalidad' => 'Argentina',
                'fecha_nacimiento' => '1914-08-26',
                'biografia' => 'Escritor argentino clave del boom latinoamericano, reconocido por su narrativa innovadora y experimental.',
            ],
            [
                'nombre' => 'Mario Vargas Llosa',
                'nacionalidad' => 'Peruana',
                'fecha_nacimiento' => '1936-03-28',
                'biografia' => 'Escritor peruano, Premio Nobel de Literatura 2010, autor de novelas politicas y sociales de gran influencia.',
            ],
            [
                'nombre' => 'Isabel Allende',
                'nacionalidad' => 'Chilena',
                'fecha_nacimiento' => '1942-08-02',
                'biografia' => 'Escritora chilena de proyeccion internacional, conocida por su narrativa historica y de realismo magico.',
            ],
            [
                'nombre' => 'Jorge Luis Borges',
                'nacionalidad' => 'Argentina',
                'fecha_nacimiento' => '1899-08-24',
                'biografia' => 'Poeta, ensayista y cuentista argentino, figura central de la literatura universal del siglo XX.',
            ],
            [
                'nombre' => 'Paulo Coelho',
                'nacionalidad' => 'Brasileña',
                'fecha_nacimiento' => '1947-08-24',
                'biografia' => 'Novelista brasileño de gran exito mundial, conocido por obras de espiritualidad y desarrollo personal.',
            ],
            [
                'nombre' => 'Stephen King',
                'nacionalidad' => 'Estadounidense',
                'fecha_nacimiento' => '1947-09-21',
                'biografia' => 'Autor estadounidense de terror, suspense y fantasia, uno de los escritores mas leidos del mundo.',
            ],
            [
                'nombre' => 'J.K. Rowling',
                'nacionalidad' => 'Britanica',
                'fecha_nacimiento' => '1965-07-31',
                'biografia' => 'Escritora britanica creadora de la saga Harry Potter, fenomeno editorial global.',
            ],
            [
                'nombre' => 'George Orwell',
                'nacionalidad' => 'Britanica',
                'fecha_nacimiento' => '1903-06-25',
                'biografia' => 'Ensayista y novelista britanico, autor de distopias y criticas politicas fundamentales.',
            ],
            [
                'nombre' => 'Franz Kafka',
                'nacionalidad' => 'Checa',
                'fecha_nacimiento' => '1883-07-03',
                'biografia' => 'Escritor de lengua alemana, referente del existencialismo y la narrativa moderna.',
            ],
            [
                'nombre' => 'Ernest Hemingway',
                'nacionalidad' => 'Estadounidense',
                'fecha_nacimiento' => '1899-07-21',
                'biografia' => 'Novelista y periodista estadounidense, Premio Nobel de Literatura 1954, famoso por su estilo conciso.',
            ],
            [
                'nombre' => 'William Shakespeare',
                'nacionalidad' => 'Britanica',
                'fecha_nacimiento' => '1564-04-26',
                'biografia' => 'Dramaturgo y poeta ingles, considerado uno de los mayores autores de la literatura universal.',
            ],
        ];

        foreach ($authors as $author) {
            Author::updateOrCreate(
                ['nombre' => $author['nombre']],
                $author
            );
        }
    }
}
