<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido'];
    
    public function libros()
    {
        return $this->hasMany(\App\Models\Libro::class);
    }
}
