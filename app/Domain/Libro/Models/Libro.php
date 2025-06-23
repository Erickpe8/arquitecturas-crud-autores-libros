<?php

namespace App\Domain\Libro\Models;
use App\Domain\Autor\Models\Autor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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