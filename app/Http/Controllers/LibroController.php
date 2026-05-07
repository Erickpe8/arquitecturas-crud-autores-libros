<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LibroController extends Controller
{
    public function index()
    {
        $search = request('search');
        $genero = request('genero');

        $libros = Libro::with('autor')
            ->when($search, fn ($query) => $query->where('titulo', 'like', "%{$search}%"))
            ->when($genero, fn ($query) => $query->where('genero', $genero))
            ->latest()
            ->paginate(24)
            ->withQueryString();

        $generos = Genero::query()
            ->orderBy('nombre')
            ->pluck('nombre');

        return view('libros.index', compact('libros', 'search', 'genero', 'generos'));
    }

    public function create()
    {
        $autores = Autor::orderBy('nombre')->pluck('nombre', 'id');
        $generos = Genero::orderBy('nombre')->pluck('nombre');

        return view('libros.create', compact('autores', 'generos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', 'unique:libros,isbn'],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ]);

        if ($request->hasFile('portada')) {
            $data['portada'] = $request->file('portada')->store('portadas', 'public');
        }

        Libro::create($data);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(Libro $libro)
    {
        $libro->load('autor');

        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $autores = Autor::orderBy('nombre')->pluck('nombre', 'id');
        $generos = Genero::orderBy('nombre')->pluck('nombre');

        return view('libros.edit', compact('libro', 'autores', 'generos'));
    }

    public function update(Request $request, Libro $libro)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', Rule::unique('libros', 'isbn')->ignore($libro->id)],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ]);

        if ($request->hasFile('portada')) {
            if ($libro->portada && Storage::disk('public')->exists($libro->portada)) {
                Storage::disk('public')->delete($libro->portada);
            }
            $data['portada'] = $request->file('portada')->store('portadas', 'public');
        }

        $libro->update($data);

        return redirect()->route('libros.show', $libro)->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        if ($libro->portada && Storage::disk('public')->exists($libro->portada)) {
            Storage::disk('public')->delete($libro->portada);
        }

        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
