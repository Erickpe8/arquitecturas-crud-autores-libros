<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\LibroRepositoryInterface;
use App\Repositories\Interfaces\AutorRepositoryInterface;

class LibroController extends Controller
{
    protected $libroRepository;
    protected $autorRepository;

    public function __construct(
        LibroRepositoryInterface $libroRepository,
        AutorRepositoryInterface $autorRepository
    ) {
        $this->libroRepository = $libroRepository;
        $this->autorRepository = $autorRepository;
    }

    /**
     * Muestra todos los libros existentes.
     * Entrada: ninguna.
     * Salida: vista con la lista de libros y sus autores.
     */
    public function index()
    {
        $libros = $this->libroRepository->all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro.
     * Entrada: ninguna.
     * Salida: vista con la lista de autores para asociar al libro.
     */
    public function create()
    {
        $autores = $this->autorRepository->all();
        return view('libros.create', compact('autores'));
    }

    /**
     * Guarda un nuevo libro en la base de datos.
     * Entrada: Request con título, género y autor_id.
     * Salida: redirección a la vista de índice de libros.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'genero' => 'required|string',
            'autor_id' => 'required|exists:autors,id',
        ]);

        $this->libroRepository->create($request->only('titulo', 'genero', 'autor_id'));

        return redirect()->route('libros.index');
    }

    /**
     * Muestra el formulario para editar un libro existente.
     * Entrada: ID del libro.
     * Salida: vista con los datos del libro y la lista de autores.
     */
    public function edit($id)
    {
        $libro = $this->libroRepository->find($id);
        $autores = $this->autorRepository->all();

        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Actualiza los datos de un libro existente.
     * Entrada: Request con título, género, autor_id; y el ID del libro.
     * Salida: redirección a la vista de índice de libros.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string',
            'genero' => 'required|string',
            'autor_id' => 'required|exists:autors,id',
        ]);

        $this->libroRepository->update($id, $request->only('titulo', 'genero', 'autor_id'));

        return redirect()->route('libros.index');
    }

    /**
     * Elimina un libro por su ID.
     * Entrada: ID del libro.
     * Salida: redirección a la vista de índice de libros.
     */
    public function destroy($id)
    {
        $this->libroRepository->delete($id);
        return redirect()->route('libros.index');
    }
}
