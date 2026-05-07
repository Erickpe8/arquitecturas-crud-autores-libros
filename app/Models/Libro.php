<?php

namespace App\Models;

use App\Entities\BookCover;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_publicacion',
        'genero',
        'isbn',
        'portada',
        'autor_id',
    ];

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }

    public function getPortadaUrlAttribute(): string
    {
        return BookCover::resolve($this->portada, $this->titulo);
    }
}
