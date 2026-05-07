<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nacionalidad',
        'fecha_nacimiento',
        'biografia',
    ];

    public function libros(): HasMany
    {
        return $this->hasMany(Libro::class);
    }
}
