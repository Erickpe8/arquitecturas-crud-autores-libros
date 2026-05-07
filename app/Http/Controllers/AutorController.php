<?php

namespace App\Http\Controllers;

use App\Application\Authors\CreateAuthorUseCase;
use App\Application\Authors\DeleteAuthorUseCase;
use App\Application\Authors\GetAuthorWithBooksUseCase;
use App\Application\Authors\ListAuthorsUseCase;
use App\Application\Authors\UpdateAuthorUseCase;
use App\Infrastructure\Laravel\PaginatorFactory;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function __construct(
        private readonly ListAuthorsUseCase $listAuthors,
        private readonly CreateAuthorUseCase $createAuthor,
        private readonly GetAuthorWithBooksUseCase $getAuthorWithBooks,
        private readonly UpdateAuthorUseCase $updateAuthor,
        private readonly DeleteAuthorUseCase $deleteAuthor,
    ) {}

    public function index()
    {
        $search = request('search');
        $result = $this->listAuthors->execute($search);
        $autores = PaginatorFactory::fromResult($result);

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

        $this->createAuthor->execute($data);

        return redirect()->route('autores.index')->with('success', 'Autor creado correctamente.');
    }

    public function show(int $autor)
    {
        $entity = $this->getAuthorWithBooks->execute($autor);
        abort_if($entity === null, 404);

        return view('autores.show', ['autor' => $entity]);
    }

    public function edit(int $autor)
    {
        $entity = $this->getAuthorWithBooks->execute($autor);
        abort_if($entity === null, 404);

        return view('autores.edit', ['autor' => $entity]);
    }

    public function update(Request $request, int $autor)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'nacionalidad' => ['nullable', 'string', 'max:120'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'biografia' => ['nullable', 'string', 'max:2000'],
        ]);

        $entity = $this->updateAuthor->execute($autor, $data);

        return redirect()->route('autores.show', ['autor' => $entity->id])->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(int $autor)
    {
        $this->deleteAuthor->execute($autor);

        return redirect()->route('autores.index')->with('success', 'Autor eliminado correctamente.');
    }
}
