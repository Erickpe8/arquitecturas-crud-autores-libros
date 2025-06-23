<?php

namespace App\Domain\Autor\Models;

use App\Domain\Libro\Models\Libro;
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
