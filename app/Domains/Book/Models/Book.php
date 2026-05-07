<?php

namespace App\Domains\Book\Models;

use App\Domains\Author\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $table = 'libros';

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
        return $this->belongsTo(Author::class, 'autor_id');
    }

    public function getPortadaUrlAttribute(): string
    {
        if ($this->portada) {
            if (filter_var($this->portada, FILTER_VALIDATE_URL)) {
                return $this->portada;
            }

            return asset('storage/' . $this->portada);
        }

        $title = urlencode(Str::limit($this->titulo, 40, ''));
        $hash = abs(crc32((string) $this->titulo));

        $backgrounds = [
            '0f172a', '1e1b4b', '172554', '052e16', '3f6212',
            '3b0764', '7f1d1d', '422006', '0c4a6e', '111827',
        ];
        $foregrounds = [
            'e2e8f0', 'f8fafc', 'fde68a', 'd9f99d', 'bfdbfe',
            'fecdd3', 'fdba74', 'ddd6fe', 'a7f3d0', 'f5f5f4',
        ];

        $bg = $backgrounds[$hash % count($backgrounds)];
        $fg = $foregrounds[$hash % count($foregrounds)];

        return "https://dummyimage.com/600x900/{$bg}/{$fg}&text={$title}";
    }
}
