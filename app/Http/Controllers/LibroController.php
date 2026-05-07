<?php

namespace App\Http\Controllers;

use App\DTOs\BookWriteDto;
use App\Infrastructure\Framework\PaginatorPresenter;
use App\Interfaces\Storage\CoverStorageInterface;
use App\Models\Libro;
use App\UseCases\Books\CreateBookUseCase;
use App\UseCases\Books\DeleteBookUseCase;
use App\UseCases\Books\GetBookFormOptionsUseCase;
use App\UseCases\Books\ListBooksUseCase;
use App\UseCases\Books\ShowBookUseCase;
use App\UseCases\Books\UpdateBookUseCase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Adaptador de interfaz (HTTP): traduce requests del framework a casos de uso.
 */
class LibroController extends Controller
{
    public function __construct(
        private readonly ListBooksUseCase $listBooks,
        private readonly GetBookFormOptionsUseCase $bookFormOptions,
        private readonly ShowBookUseCase $showBook,
        private readonly CreateBookUseCase $createBook,
        private readonly UpdateBookUseCase $updateBook,
        private readonly DeleteBookUseCase $deleteBook,
        private readonly CoverStorageInterface $coverStorage,
    ) {}

    public function index()
    {
        $search = request('search');
        $genero = request('genero');

        $read = $this->listBooks->execute($search, $genero);
        $libros = PaginatorPresenter::fromPageResult($read->booksPage);

        return view('libros.index', [
            'libros' => $libros,
            'search' => $search,
            'genero' => $genero,
            'generos' => $read->generos,
        ]);
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

        $this->createBook->execute(new BookWriteDto($data));

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(Libro $libro)
    {
        $entity = $this->showBook->execute($libro->id);
        abort_if($entity === null, 404);

        return view('libros.show', ['libro' => $entity]);
    }

    public function edit(Libro $libro)
    {
        $opts = $this->bookFormOptions->execute();
        $entity = $this->showBook->execute($libro->id);
        abort_if($entity === null, 404);

        return view('libros.edit', [
            'libro' => $entity,
            'autores' => $opts['autores'],
            'generos' => $opts['generos'],
        ]);
    }

    public function update(Request $request, Libro $libro)
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', Rule::unique('libros', 'isbn')->ignore($libro->id)],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ]);

        if ($request->hasFile('portada')) {
            $data['portada'] = $this->coverStorage->storeFromUploaded($request->file('portada'));
        }

        $updated = $this->updateBook->execute($libro->id, new BookWriteDto($data));

        return redirect()->route('libros.show', ['libro' => $updated->id])->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $this->deleteBook->execute($libro->id);

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
