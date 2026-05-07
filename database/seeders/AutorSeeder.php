<?php

namespace Database\Seeders;

use App\Domains\Author\Models\Author;
use Illuminate\Database\Seeder;

class AutorSeeder extends Seeder
{
    public function run(): void
    {
        Author::factory()->count(12)->create();
    }
}
