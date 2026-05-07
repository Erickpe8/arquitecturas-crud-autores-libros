<?php

namespace App\Domains\Book\Controllers;

use App\Domains\Book\Models\Book;
use App\Domains\Book\Requests\StoreBookRequest;
use App\Domains\Book\Requests\UpdateBookRequest;
use App\Domains\Book\Services\BookService;
use App\Http\Controllers\Controller;

class BookController extends Controller
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

    public function store(StoreBookRequest $request)
    {
        $this->bookService->store($request->validated(), $request->file('portada'));

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(Book $libro)
    {
        $libro = $this->bookService->show($libro);

        return view('libros.show', compact('libro'));
    }

    public function edit(Book $libro)
    {
        $result = $this->bookService->formData();
        $autores = $result['autores'];
        $generos = $result['generos'];

        return view('libros.edit', compact('libro', 'autores', 'generos'));
    }

    public function update(UpdateBookRequest $request, Book $libro)
    {
        $libro = $this->bookService->update($libro, $request->validated(), $request->file('portada'));

        return redirect()->route('libros.show', ['libro' => $libro->id])->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Book $libro)
    {
        $this->bookService->destroy($libro);

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
