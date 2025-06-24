<?php

namespace App\Domain\Libro\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Autor\Entities\Autor;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'genero',
        'autor_id',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
