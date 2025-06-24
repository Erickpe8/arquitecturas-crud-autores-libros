<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Entities\Autor;

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
