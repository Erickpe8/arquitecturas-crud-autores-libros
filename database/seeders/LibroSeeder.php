<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        Autor::all()->each(function (Autor $autor) {
            Libro::factory()
                ->count(rand(2, 5))
                ->create(['autor_id' => $autor->id]);
        });
    }
}
