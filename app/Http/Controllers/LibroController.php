<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Muestra la lista de todos los libros con su autor relacionado.
     * No recibe datos de entrada.
     * Retorna una vista con la tabla de libros.
     */
    public function index()
    {
        $libros = Libro::with('autor')->get();
        return view('libros.index', compact('libros'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro.
     * No recibe datos de entrada.
     * Retorna la vista del formulario junto con la lista de autores.
     */
    public function create()
    {
        $autores = Autor::all();
        return view('libros.create', compact('autores'));
    }

    /**
     * Guarda un nuevo libro en la base de datos.
     * Recibe los campos 'titulo', 'genero' y 'autor_id' mediante la solicitud.
     * Redirige a la lista de libros si la validación es exitosa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'autor_id' => 'required|exists:autors,id',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Muestra los detalles de un libro específico.
     * Recibe el modelo del libro.
     * Retorna la vista con la información del libro.
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Muestra el formulario para editar un libro.
     * Recibe el modelo del libro a editar.
     * Retorna la vista con los datos del libro y los autores disponibles.
     */
    public function edit(Libro $libro)
    {
        $autores = Autor::all();
        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Actualiza la información de un libro existente.
     * Recibe la solicitud con los nuevos datos y el modelo del libro a actualizar.
     * Redirige a la lista de libros con un mensaje de éxito si la validación es correcta.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'autor_id' => 'required|exists:autors,id',
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Elimina un libro de la base de datos.
     * Recibe el modelo del libro a eliminar.
     * Redirige a la lista de libros con un mensaje de confirmación.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado.');
    }
}
