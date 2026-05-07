<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Repositories\Interfaces\AuthorRepositoryInterface;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(private readonly AuthorRepositoryInterface $authorRepository)
    {
    }

    public function index()
    {
        $search = request('search');
        $autores = $this->authorRepository->paginateWithSearch($search);

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

        $this->authorRepository->create($data);

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(Autor $autor)
    {
        $autor = $this->authorRepository->loadForShow($autor);

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

        $autor = $this->authorRepository->update($autor, $data);

        return redirect()->route('autores.show', $autor)->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Autor $autor)
    {
        $this->authorRepository->delete($autor);

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
