<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController extends Controller
{
    public function __construct(private readonly BookRepositoryInterface $bookRepository)
    {
    }

    public function index()
    {
        $search = request('search');
        $genero = request('genero');

        $libros = $this->bookRepository->paginateWithFilters($search, $genero);
        $generos = $this->bookRepository->allGenres();

        return view('libros.index', compact('libros', 'search', 'genero', 'generos'));
    }

    public function create()
    {
        $autores = $this->bookRepository->allAuthorsForSelect();
        $generos = $this->bookRepository->allGenres();

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

        $this->bookRepository->create($data, $request->file('portada'));

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(Libro $libro)
    {
        $libro = $this->bookRepository->loadForShow($libro);

        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $autores = $this->bookRepository->allAuthorsForSelect();
        $generos = $this->bookRepository->allGenres();

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

        $libro = $this->bookRepository->update($libro, $data, $request->file('portada'));

        return redirect()->route('libros.show', $libro)->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $this->bookRepository->delete($libro);

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
