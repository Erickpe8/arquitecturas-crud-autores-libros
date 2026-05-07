<?php

namespace App\Domains\Author\Models;

use App\Domains\Book\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $table = 'autors';

    protected $fillable = [
        'nombre',
        'nacionalidad',
        'fecha_nacimiento',
        'biografia',
    ];

    public function libros(): HasMany
    {
        return $this->hasMany(Book::class, 'autor_id');
    }
}
