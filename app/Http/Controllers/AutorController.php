<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $search = request('search');

        $autores = Autor::withCount('libros')
            ->when($search, fn ($query) => $query->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate(24)
            ->withQueryString();

        return view('autores.index', compact('autores', 'search'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'nacionalidad' => ['nullable', 'string', 'max:120'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'biografia' => ['nullable', 'string', 'max:2000'],
        ]);

        Autor::create($data);

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(Autor $autor)
    {
        $autor->load(['libros' => fn ($query) => $query->latest('fecha_publicacion')]);

        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'nacionalidad' => ['nullable', 'string', 'max:120'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'biografia' => ['nullable', 'string', 'max:2000'],
        ]);

        $autor->update($data);

        return redirect()->route('autores.show', $autor)->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
