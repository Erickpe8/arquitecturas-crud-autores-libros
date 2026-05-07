<?php

namespace App\Services;

use App\Models\Autor;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BookService
{
    public function countAll(): int
    {
        return Libro::count();
    }

    public function mostRegisteredGenreName(): ?string
    {
        return Libro::query()
            ->whereNotNull('genero')
            ->where('genero', '!=', '')
            ->selectRaw('genero, COUNT(*) as total')
            ->groupBy('genero')
            ->orderByDesc('total')
            ->value('genero');
    }

    public function index(?string $search, ?string $genero): array
    {
        $libros = Libro::with('autor')
            ->when($search, fn ($query) => $query->where('titulo', 'like', "%{$search}%"))
            ->when($genero, fn ($query) => $query->where('genero', $genero))
            ->latest()
            ->paginate(24)
            ->withQueryString();

        $generos = Genero::query()
            ->orderBy('nombre')
            ->pluck('nombre');

        return compact('libros', 'generos');
    }

    public function formData(): array
    {
        $autores = Autor::orderBy('nombre')->pluck('nombre', 'id');
        $generos = Genero::orderBy('nombre')->pluck('nombre');

        return compact('autores', 'generos');
    }

    public function show(Libro $libro): Libro
    {
        $libro->load('autor');

        return $libro;
    }

    public function store(array $data, ?UploadedFile $portada): Libro
    {
        if ($portada) {
            $data['portada'] = $portada->store('portadas', 'public');
        }

        return Libro::create($data);
    }

    public function update(Libro $libro, array $data, ?UploadedFile $portada): Libro
    {
        if ($portada) {
            $this->deleteCover($libro);
            $data['portada'] = $portada->store('portadas', 'public');
        }

        $libro->update($data);

        return $libro;
    }

    public function destroy(Libro $libro): void
    {
        $this->deleteCover($libro);
        $libro->delete();
    }

    public function storeRules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', 'unique:libros,isbn'],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ];
    }

    public function updateRules(Libro $libro): array
    {
        return [
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', Rule::unique('libros', 'isbn')->ignore($libro->id)],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ];
    }

    private function deleteCover(Libro $libro): void
    {
        if ($libro->portada && Storage::disk('public')->exists($libro->portada)) {
            Storage::disk('public')->delete($libro->portada);
        }
    }
}
