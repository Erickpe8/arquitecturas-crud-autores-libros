<?php

namespace App\Http\Controllers;

use App\Commands\Authors\CreateAuthorCommand;
use App\Commands\Authors\DeleteAuthorCommand;
use App\Commands\Authors\UpdateAuthorCommand;
use App\Handlers\Authors\CreateAuthorCommandHandler;
use App\Handlers\Authors\DeleteAuthorCommandHandler;
use App\Handlers\Authors\GetAuthorDetailQueryHandler;
use App\Handlers\Authors\GetAuthorsQueryHandler;
use App\Handlers\Authors\UpdateAuthorCommandHandler;
use App\Models\Autor;
use App\Queries\Authors\GetAuthorDetailQuery;
use App\Queries\Authors\GetAuthorsQuery;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(
        private readonly GetAuthorsQueryHandler $getAuthors,
        private readonly GetAuthorDetailQueryHandler $getAuthorDetail,
        private readonly CreateAuthorCommandHandler $createAuthor,
        private readonly UpdateAuthorCommandHandler $updateAuthor,
        private readonly DeleteAuthorCommandHandler $deleteAuthor,
    ) {}

    public function index()
    {
        $search = request('search');
        $autores = $this->getAuthors->handle(new GetAuthorsQuery($search));

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

        $this->createAuthor->handle(new CreateAuthorCommand(
            nombre: $data['nombre'],
            nacionalidad: $data['nacionalidad'] ?? null,
            fecha_nacimiento: $data['fecha_nacimiento'] ?? null,
            biografia: $data['biografia'] ?? null,
        ));

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(Autor $autor)
    {
        $autor = $this->getAuthorDetail->handle(new GetAuthorDetailQuery($autor->id));

        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        $autor = $this->getAuthorDetail->handle(new GetAuthorDetailQuery($autor->id));

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

        $updated = $this->updateAuthor->handle(new UpdateAuthorCommand(
            authorId: $autor->id,
            nombre: $data['nombre'],
            nacionalidad: $data['nacionalidad'] ?? null,
            fecha_nacimiento: $data['fecha_nacimiento'] ?? null,
            biografia: $data['biografia'] ?? null,
        ));

        return redirect()->route('autores.show', $updated)->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Autor $autor)
    {
        $this->deleteAuthor->handle(new DeleteAuthorCommand($autor->id));

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
