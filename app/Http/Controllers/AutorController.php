<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor; 

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $autores = Autor::withCount('libros')->get();
    return view('autores.index', compact('autores'));
}

public function create()
{
    return view('autores.create');
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string',
        'apellido' => 'required|string',
    ]);

    Autor::create($request->only('nombre', 'apellido'));

    return redirect()->route('autores.index');
}

public function update(Request $request, Autor $autor)
{
    $request->validate([
        'nombre' => 'required|string',
        'apellido' => 'required|string',
    ]);

    $autor->update($request->only('nombre', 'apellido'));

    return redirect()->route('autores.index');
}

public function destroy(Autor $autor)
{
    $autor->delete();
    return redirect()->route('autores.index');
}
}