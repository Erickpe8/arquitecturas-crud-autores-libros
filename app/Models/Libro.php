<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Libro extends Model
{
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
}
