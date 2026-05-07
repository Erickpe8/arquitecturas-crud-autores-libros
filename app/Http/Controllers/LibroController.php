<?php

namespace App\Http\Controllers;

use App\Application\Books\CreateBookUseCase;
use App\Application\Books\DeleteBookUseCase;
use App\Application\Books\GetBookFormOptionsUseCase;
use App\Application\Books\GetBookUseCase;
use App\Application\Books\ListBooksUseCase;
use App\Application\Books\UpdateBookUseCase;
use App\Core\Ports\Outbound\CoverStoragePort;
use App\Infrastructure\Laravel\PaginatorFactory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController extends Controller
{
    public function __construct(
        private readonly ListBooksUseCase $listBooks,
        private readonly GetBookFormOptionsUseCase $bookFormOptions,
        private readonly CreateBookUseCase $createBook,
        private readonly GetBookUseCase $getBook,
        private readonly UpdateBookUseCase $updateBook,
        private readonly DeleteBookUseCase $deleteBook,
        private readonly CoverStoragePort $coverStorage,
    ) {}

    public function index()
    {
        $search = request('search');
        $genero = request('genero');

        $result = $this->listBooks->execute($search, $genero);
        $libros = PaginatorFactory::fromResult($result);

        $generos = $this->bookFormOptions->execute()['generos'];

        return view('libros.index', compact('libros', 'search', 'genero', 'generos'));
    }

    public function create()
    {
        $opts = $this->bookFormOptions->execute();

        return view('libros.create', ['autores' => $opts['autores'], 'generos' => $opts['generos']]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', 'unique:libros,isbn'],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ]);

        if ($request->hasFile('portada')) {
            $data['portada'] = $this->coverStorage->storeFromUploaded($request->file('portada'));
        }

        $this->createBook->execute($data);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(int $libro)
    {
        $entity = $this->getBook->execute($libro);
        abort_if($entity === null, 404);

        return view('libros.show', ['libro' => $entity]);
    }

    public function edit(int $libro)
    {
        $opts = $this->bookFormOptions->execute();
        $entity = $this->getBook->execute($libro);
        abort_if($entity === null, 404);

        return view('libros.edit', [
            'libro' => $entity,
            'autores' => $opts['autores'],
            'generos' => $opts['generos'],
        ]);
    }

    public function update(Request $request, int $libro)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', Rule::unique('libros', 'isbn')->ignore($libro)],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ]);

        if ($request->hasFile('portada')) {
            $data['portada'] = $this->coverStorage->storeFromUploaded($request->file('portada'));
        }

        $this->updateBook->execute($libro, $data);

        return redirect()->route('libros.show', ['libro' => $libro])->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(int $libro)
    {
        $this->deleteBook->execute($libro);

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
