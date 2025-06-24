<?php

namespace App\Domain\Autor\Entities;

use App\Domain\Libro\Entities\Libro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido'];
    
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
