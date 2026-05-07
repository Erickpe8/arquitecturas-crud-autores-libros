<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Core\Services\BookCoverUrlGenerator;

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

    protected function casts(): array
    {
        return [
            'fecha_publicacion' => 'date',
        ];
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }

    public function getPortadaUrlAttribute(): string
    {
        return BookCoverUrlGenerator::resolve($this->portada, $this->titulo);
    }
}
