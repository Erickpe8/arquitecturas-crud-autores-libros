<?php

namespace App\Http\Controllers;

use App\DTOs\AuthorWriteDto;
use App\Infrastructure\Framework\PaginatorPresenter;
use App\Models\Autor;
use App\UseCases\Authors\CreateAuthorUseCase;
use App\UseCases\Authors\DeleteAuthorUseCase;
use App\UseCases\Authors\GetAuthorForEditUseCase;
use App\UseCases\Authors\ListAuthorsUseCase;
use App\UseCases\Authors\ShowAuthorUseCase;
use App\UseCases\Authors\UpdateAuthorUseCase;
use Illuminate\Http\Request;

/**
 * Adaptador de interfaz (HTTP): traduce requests del framework a casos de uso.
 */
class AutorController extends Controller
{
    public function __construct(
        private readonly ListAuthorsUseCase $listAuthors,
        private readonly ShowAuthorUseCase $showAuthor,
        private readonly GetAuthorForEditUseCase $authorForEdit,
        private readonly CreateAuthorUseCase $createAuthor,
        private readonly UpdateAuthorUseCase $updateAuthor,
        private readonly DeleteAuthorUseCase $deleteAuthor,
    ) {}

    public function index()
    {
        $search = request('search');
        $page = $this->listAuthors->execute($search);
        $autores = PaginatorPresenter::fromPageResult($page);

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

        $this->createAuthor->execute(new AuthorWriteDto(
            nombre: $data['nombre'],
            nacionalidad: $data['nacionalidad'] ?? null,
            fecha_nacimiento: $data['fecha_nacimiento'] ?? null,
            biografia: $data['biografia'] ?? null,
        ));

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(Autor $autor)
    {
        $entity = $this->showAuthor->execute($autor->id);
        abort_if($entity === null, 404);

        return view('autores.show', ['autor' => $entity]);
    }

    public function edit(Autor $autor)
    {
        $entity = $this->authorForEdit->execute($autor->id);
        abort_if($entity === null, 404);

        return view('autores.edit', ['autor' => $entity]);
    }

    public function update(Request $request, Autor $autor)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'nacionalidad' => ['nullable', 'string', 'max:120'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'biografia' => ['nullable', 'string', 'max:2000'],
        ]);

        $updated = $this->updateAuthor->execute($autor->id, new AuthorWriteDto(
            nombre: $data['nombre'],
            nacionalidad: $data['nacionalidad'] ?? null,
            fecha_nacimiento: $data['fecha_nacimiento'] ?? null,
            biografia: $data['biografia'] ?? null,
        ));

        return redirect()->route('autores.show', ['autor' => $updated->id])->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Autor $autor)
    {
        $this->deleteAuthor->execute($autor->id);

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
