<?php

namespace App\Interfaces\Web\Controllers;

use Illuminate\Http\Request;
use App\Domain\Libro\Repositories\LibroRepositoryInterface;
use App\Domain\Autor\Repositories\AutorRepositoryInterface; 

class LibroController extends Controller
{
    protected $libroRepository;
    protected $autorRepository;

    /**
     * Inyecta los repositorios de libros y autores al controlador.
     * Recibe instancias de LibroRepositoryInterface y AutorRepositoryInterface.
     * No retorna ningún valor.
     */
    public function __construct(
        LibroRepositoryInterface $libroRepository,
        AutorRepositoryInterface $autorRepository
    ) {
        $this->libroRepository = $libroRepository;
        $this->autorRepository = $autorRepository;
    }

    /**
     * Muestra todos los libros existentes.
     * No recibe parámetros.
     * Retorna la vista con la lista de libros y sus autores.
     */
    public function index()
    {
        $libros = $this->libroRepository->all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro.
     * No recibe parámetros.
     * Retorna la vista con la lista de autores disponibles.
     */
    public function create()
    {
        $autores = $this->autorRepository->all();
        return view('libros.create', compact('autores'));
    }

    /**
     * Guarda un nuevo libro en la base de datos.
     * Recibe un Request con los campos: titulo, genero y autor_id.
     * Redirige a la vista del índice de libros.
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
     * Recibe el ID del libro como parámetro.
     * Retorna la vista con los datos del libro y la lista de autores.
     */
    public function edit($id)
    {
        $libro = $this->libroRepository->find($id);
        $autores = $this->autorRepository->all();

        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Actualiza los datos de un libro existente.
     * Recibe un Request con los campos actualizados y el ID del libro.
     * Redirige a la vista del índice de libros.
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
     * Elimina un libro de la base de datos.
     * Recibe el ID del libro como parámetro.
     * Redirige a la vista del índice de libros.
     */
    public function destroy($id)
    {
        $this->libroRepository->delete($id);
        return redirect()->route('libros.index');
    }
}
