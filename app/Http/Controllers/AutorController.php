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
     * Inyecta el servicio de autores.
     *
     * @param AutorService $autorService
     */
    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    /**
     * Muestra todos los autores.
     */
    public function index()
    {
        $autores = $this->autorService->getAll();
        return view('autores.index', compact('autores'));
    }

    /**
     * Muestra el formulario de creación de autor.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Guarda un nuevo autor en la base de datos.
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
     * Muestra el formulario de edición para un autor.
     */
    public function edit($id)
    {
        $autor = $this->autorService->find($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Actualiza un autor existente.
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
     * Elimina un autor.
     */
    public function destroy($id)
    {
        $this->autorService->delete($id);
        return redirect()->route('autores.index');
    }
}
