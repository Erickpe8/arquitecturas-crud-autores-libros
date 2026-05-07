<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Services\BookService;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function __construct(private readonly BookService $bookService)
    {
    }

    public function index()
    {
        $search = request('search');
        $genero = request('genero');
        $result = $this->bookService->index($search, $genero);
        $libros = $result['libros'];
        $generos = $result['generos'];

        return view('libros.index', compact('libros', 'search', 'genero', 'generos'));
    }

    public function create()
    {
        $result = $this->bookService->formData();
        $autores = $result['autores'];
        $generos = $result['generos'];

        return view('libros.create', compact('autores', 'generos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->bookService->storeRules());
        $this->bookService->store($data, $request->file('portada'));

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(Libro $libro)
    {
        $libro = $this->bookService->show($libro);

        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $result = $this->bookService->formData();
        $autores = $result['autores'];
        $generos = $result['generos'];

        return view('libros.edit', compact('libro', 'autores', 'generos'));
    }

    public function update(Request $request, Libro $libro)
    {
        $data = $request->validate($this->bookService->updateRules($libro));
        $libro = $this->bookService->update($libro, $data, $request->file('portada'));

        return redirect()->route('libros.show', $libro)->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $this->bookService->destroy($libro);

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
