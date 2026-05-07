<?php

namespace Database\Seeders;

use App\Domains\Author\Models\Author;
use App\Domains\Book\Models\Book;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        Author::all()->each(function (Author $autor) {
            Book::factory()
                ->count(rand(2, 5))
                ->create(['autor_id' => $autor->id]);
        });
    }
}
