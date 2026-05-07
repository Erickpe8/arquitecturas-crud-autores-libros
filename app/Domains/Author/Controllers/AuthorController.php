<?php

namespace App\Domains\Author\Controllers;

use App\Domains\Author\Models\Author;
use App\Domains\Author\Requests\StoreAuthorRequest;
use App\Domains\Author\Requests\UpdateAuthorRequest;
use App\Domains\Author\Services\AuthorService;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
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

    public function store(StoreAuthorRequest $request)
    {
        $this->authorService->store($request->validated());

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(Author $autor)
    {
        $autor = $this->authorService->show($autor);

        return view('autores.show', compact('autor'));
    }

    public function edit(Author $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(UpdateAuthorRequest $request, Author $autor)
    {
        $autor = $this->authorService->update($autor, $request->validated());

        return redirect()->route('autores.show', ['autor' => $autor->id])->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Author $autor)
    {
        $this->authorService->destroy($autor);

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
