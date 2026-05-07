<?php

namespace App\Http\Controllers;

use App\Commands\Books\CreateBookCommand;
use App\Commands\Books\DeleteBookCommand;
use App\Commands\Books\UpdateBookCommand;
use App\Handlers\Books\CreateBookCommandHandler;
use App\Handlers\Books\DeleteBookCommandHandler;
use App\Handlers\Books\GetBookDetailQueryHandler;
use App\Handlers\Books\GetBookFormOptionsQueryHandler;
use App\Handlers\Books\PaginatedBooksQueryHandler;
use App\Handlers\Books\UpdateBookCommandHandler;
use App\Models\Libro;
use App\Queries\Books\GetBookDetailQuery;
use App\Queries\Books\GetBookFormOptionsQuery;
use App\Queries\Books\GetBooksQuery;
use App\Queries\Books\SearchBooksQuery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController extends Controller
{
    public function __construct(
        private readonly PaginatedBooksQueryHandler $paginatedBooks,
        private readonly GetBookFormOptionsQueryHandler $bookFormOptions,
        private readonly GetBookDetailQueryHandler $getBookDetail,
        private readonly CreateBookCommandHandler $createBook,
        private readonly UpdateBookCommandHandler $updateBook,
        private readonly DeleteBookCommandHandler $deleteBook,
    ) {}

    public function index()
    {
        $search = request('search');
        $genero = request('genero');

        $libros = (($search !== null && $search !== '') || ($genero !== null && $genero !== ''))
            ? $this->paginatedBooks->handle(new SearchBooksQuery($search, $genero))
            : $this->paginatedBooks->handle(new GetBooksQuery($search, $genero));

        $generos = $this->bookFormOptions->handle(new GetBookFormOptionsQuery())['generos'];

        return view('libros.index', compact('libros', 'search', 'genero', 'generos'));
    }

    public function create()
    {
        $opts = $this->bookFormOptions->handle(new GetBookFormOptionsQuery());

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
            $data['portada'] = $request->file('portada')->store('portadas', 'public');
        }

        $this->createBook->handle(new CreateBookCommand($data));

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function show(Libro $libro)
    {
        $libro = $this->getBookDetail->handle(new GetBookDetailQuery($libro->id));

        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $opts = $this->bookFormOptions->handle(new GetBookFormOptionsQuery());
        $libro = $this->getBookDetail->handle(new GetBookDetailQuery($libro->id));

        return view('libros.edit', [
            'libro' => $libro,
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
            $data['portada'] = $request->file('portada')->store('portadas', 'public');
        }

        $updated = $this->updateBook->handle(new UpdateBookCommand($libro->id, $data));

        return redirect()->route('libros.show', $updated)->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $this->deleteBook->handle(new DeleteBookCommand($libro->id));

        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
