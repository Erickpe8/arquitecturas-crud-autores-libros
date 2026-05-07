<?php

namespace App\Domains\Book\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'generos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
