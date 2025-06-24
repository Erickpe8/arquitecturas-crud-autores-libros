<?php

namespace App\Interfaces\Web\Controllers;

use Illuminate\Http\Request;
use App\Application\Autor\UseCases\ListAutores;
use App\Application\Autor\UseCases\CreateAutor;
use App\Application\Autor\UseCases\FindAutor;
use App\Application\Autor\UseCases\UpdateAutor;
use App\Application\Autor\UseCases\DeleteAutor;
use function view;

class AutorController extends Controller
{
    /**
     * Muestra todos los autores disponibles.
     * Entrada: caso de uso ListAutores.
     * Salida: vista con la lista de autores.
     */
    public function index(ListAutores $useCase)
    {
        $autores = $useCase->execute();
        return view('autores.index', compact('autores'));
    }

    /**
     * Muestra el formulario para crear un nuevo autor.
     * Entrada: ninguna.
     * Salida: vista con formulario de creación.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Guarda un nuevo autor.
     * Entrada: Request con nombre y apellido, y caso de uso CreateAutor.
     * Salida: redirección a lista de autores.
     */
    public function store(Request $request, CreateAutor $useCase)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $useCase->execute($request->only(['nombre', 'apellido']));

        return redirect()->route('autores.index');
    }

    /**
     * Muestra el formulario de edición.
     * Entrada: ID del autor y caso de uso FindAutor.
     * Salida: vista con los datos del autor.
     */
    public function edit($id, FindAutor $useCase)
    {
        $autor = $useCase->execute($id);
        return view('autores.edit', compact('autor'));
    }

    /**
     * Actualiza un autor.
     * Entrada: Request con datos actualizados, ID y caso de uso UpdateAutor.
     * Salida: redirección a lista de autores.
     */
    public function update(Request $request, $id, UpdateAutor $useCase)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $useCase->execute($id, $request->only(['nombre', 'apellido']));

        return redirect()->route('autores.index');
    }

    /**
     * Elimina un autor.
     * Entrada: ID del autor y caso de uso DeleteAutor.
     * Salida: redirección a lista de autores.
     */
    public function destroy($id, DeleteAutor $useCase)
    {
        $useCase->execute($id);
        return redirect()->route('autores.index');
    }
}
