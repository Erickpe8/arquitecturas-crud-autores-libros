<?php

namespace App\Interfaces\Web\Controllers;

use Illuminate\Http\Request;
use App\Application\Libro\Commands\CreateLibro;
use App\Application\Libro\Commands\UpdateLibro;
use App\Application\Libro\Commands\DeleteLibro;
use App\Application\Libro\Queries\ListLibros;
use App\Application\Libro\Queries\FindLibro;
use App\Application\Autor\Queries\ListAutor;

use function view;

class LibroController extends Controller
{
    /**
     * Muestra todos los libros existentes.
     * Entrada: caso de uso ListLibros.
     * Salida: vista con la lista de libros.
     */
    public function index(ListLibros $useCase)
    {
        $libros = $useCase->execute();
        return view('libros.index', compact('libros'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro.
     * Entrada: caso de uso ListAutores.
     * Salida: vista con formulario de creación y lista de autores.
     */
    public function create(ListAutor $useCase)
    {
        $autores = $useCase->execute();
        return view('libros.create', compact('autores'));
    }

    /**
     * Guarda un nuevo libro.
     * Entrada: Request con título, género y autor_id; caso de uso CreateLibro.
     * Salida: redirección a lista de libros.
     */
    public function store(Request $request, CreateLibro $useCase)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'autor_id' => 'required|exists:autors,id',
        ]);

        $useCase->execute($request->only(['titulo', 'genero', 'autor_id']));

        return redirect()->route('libros.index');
    }

    /**
     * Muestra el formulario de edición.
     * Entrada: ID del libro, caso de uso FindLibro y ListAutores.
     * Salida: vista con los datos del libro y los autores disponibles.
     */
    public function edit($id, FindLibro $findLibro, ListAutor $listAutores)
    {
        $libro = $findLibro->execute($id);
        $autores = $listAutores->execute();
        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Actualiza un libro existente.
     * Entrada: Request con datos actualizados, ID y caso de uso UpdateLibro.
     * Salida: redirección a lista de libros.
     */
    public function update(Request $request, $id, UpdateLibro $useCase)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'autor_id' => 'required|exists:autors,id',
        ]);

        $useCase->execute($id, $request->only(['titulo', 'genero', 'autor_id']));

        return redirect()->route('libros.index');
    }

    /**
     * Elimina un libro.
     * Entrada: ID del libro y caso de uso DeleteLibro.
     * Salida: redirección a lista de libros.
     */
    public function destroy($id, DeleteLibro $useCase)
    {
        $useCase->execute($id);
        return redirect()->route('libros.index');
    }
}
