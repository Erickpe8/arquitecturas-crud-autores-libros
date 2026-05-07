<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Services\AuthorService;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(private readonly AuthorService $authorService)
    {
    }

    public function index()
    {
        $search = request('search');
        $autores = $this->authorService->index($search);

        return view('autores.index', compact('autores', 'search'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->authorService->storeRules());
        $this->authorService->store($data);

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(Autor $autor)
    {
        $autor = $this->authorService->show($autor);

        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $data = $request->validate($this->authorService->updateRules());
        $autor = $this->authorService->update($autor, $data);

        return redirect()->route('autores.show', $autor)->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Autor $autor)
    {
        $this->authorService->destroy($autor);

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
