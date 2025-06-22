<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LibroService;
use App\Services\AutorService;
use function view;

class AutorController extends Controller
{
    protected $autorService;

    /**
     * Inyecta el servicio de autores al controlador.
     * Recibe una instancia de AutorService.
     * No retorna ningún valor.
     */
    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    /**
     * Muestra todos los autores disponibles.
     * No recibe parámetros.
     * Retorna la vista con la lista de autores.
     */
    public function index()
    {
        $autores = $this->autorService->getAll();
        return view('autores.index', compact('autores'));
    }

    /**
     * Muestra el formulario para crear un nuevo autor.
     * No recibe parámetros.
     * Retorna la vista del formulario de creación.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Guarda un nuevo autor en la base de datos.
     * Recibe un Request con los campos 'nombre' y 'apellido'.
     * Redirige a la ruta de la lista de autores.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $this->autorService->create($request->only(['nombre', 'apellido']));

        return redirect()->route('autores.index');
    }

    /**
     * Muestra el formulario para editar un autor existente.
     * Recibe el ID del autor como parámetro.
     * Retorna la vista con los datos del autor a editar.
     */
    public function edit($id)
    {
        $autor = $this->autorService->find($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Actualiza los datos de un autor específico.
     * Recibe un Request con los nuevos datos y el ID del autor.
     * Redirige a la ruta de la lista de autores.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $this->autorService->update($id, $request->only(['nombre', 'apellido']));

        return redirect()->route('autores.index');
    }

    /**
     * Elimina un autor de la base de datos.
     * Recibe el ID del autor como parámetro.
     * Redirige a la ruta de la lista de autores.
     */
    public function destroy($id)
    {
        $this->autorService->delete($id);
        return redirect()->route('autores.index');
    }
}
