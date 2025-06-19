<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor; 

class AutorController extends Controller
{
    /**
     * Muestra la lista de todos los autores junto con el número de libros que tienen.
     * No recibe datos de entrada.
     * Retorna una vista con la tabla de autores.
     */
    public function index()
    {
        $autores = Autor::withCount('libros')->get();
        return view('autores.index', compact('autores'));
    }

    /**
     * Muestra el formulario para crear un nuevo autor.
     * No recibe datos de entrada.
     * Retorna la vista del formulario de creación.
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Guarda un nuevo autor en la base de datos.
     * Recibe una solicitud con los campos 'nombre' y 'apellido'.
     * Redirige a la lista de autores si la validación es exitosa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        Autor::create($request->only('nombre', 'apellido'));

        return redirect()->route('autores.index');
    }

    /**
     * Actualiza los datos de un autor existente.
     * Recibe la solicitud con los nuevos datos y el autor a actualizar.
     * Redirige a la lista de autores si la validación es exitosa.
     */
    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $autor->update($request->only('nombre', 'apellido'));

        return redirect()->route('autores.index');
    }

    /**
     * Elimina un autor de la base de datos.
     * Recibe el autor a eliminar.
     * Redirige a la lista de autores luego de la eliminación.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autores.index');
    }
}
