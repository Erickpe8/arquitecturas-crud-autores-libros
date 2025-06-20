<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\AutorRepositoryInterface;

class AutorController extends Controller
{
    protected $autorRepository;

    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    /**
     * Muestra la lista de autores.
     * Entrada: ninguna
     * Salida: vista con todos los autores
     */
    public function index()
    {
        $autores = $this->autorRepository->all();
        return view('autores.index', compact('autores'));
    }

    /**
     * Muestra el formulario para crear un autor.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Guarda un nuevo autor.
     * Entrada: Request con nombre y apellido
     * Salida: redirección a la lista
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $this->autorRepository->create($request->only('nombre', 'apellido'));

        return redirect()->route('autores.index');
    }

    /**
     * Muestra el formulario para editar un autor.
     * Entrada: ID del autor
     * Salida: vista con datos del autor
     */
    public function edit($id)
    {
        $autor = $this->autorRepository->find($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Actualiza un autor existente.
     * Entrada: Request y ID del autor
     * Salida: redirección
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $this->autorRepository->update($id, $request->only('nombre', 'apellido'));

        return redirect()->route('autores.index');
    }

    /**
     * Elimina un autor.
     * Entrada: ID del autor
     * Salida: redirección
     */
    public function destroy($id)
    {
        $this->autorRepository->delete($id);
        return redirect()->route('autores.index');
    }
}
