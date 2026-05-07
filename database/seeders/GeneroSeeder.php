<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        $generos = [
            ['nombre' => 'Fantasia', 'descripcion' => 'Historias con elementos magicos o sobrenaturales.'],
            ['nombre' => 'Ciencia ficcion', 'descripcion' => 'Narrativas con base cientifica, futurista o tecnologica.'],
            ['nombre' => 'Drama', 'descripcion' => 'Relatos centrados en conflictos humanos y emocionales.'],
            ['nombre' => 'Terror', 'descripcion' => 'Obras disenadas para provocar tension y miedo.'],
            ['nombre' => 'Romance', 'descripcion' => 'Historias enfocadas en relaciones afectivas y amorosas.'],
            ['nombre' => 'Realismo magico', 'descripcion' => 'Mezcla de realidad cotidiana con elementos fantasticos.'],
            ['nombre' => 'Filosofia', 'descripcion' => 'Textos con reflexion sobre existencia, etica y pensamiento.'],
            ['nombre' => 'Literatura clasica', 'descripcion' => 'Obras de referencia historica y canon literario.'],
            ['nombre' => 'Aventura', 'descripcion' => 'Relatos de viaje, riesgo y exploracion.'],
            ['nombre' => 'Misterio', 'descripcion' => 'Historias de enigmas, investigacion y suspense.'],
        ];

        foreach ($generos as $genero) {
            Genero::updateOrCreate(
                ['nombre' => $genero['nombre']],
                $genero
            );
        }
    }
}
