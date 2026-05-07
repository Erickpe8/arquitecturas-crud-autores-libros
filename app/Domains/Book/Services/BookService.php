<?php

namespace App\Domains\Book\Services;

use App\Domains\Author\Models\Author;
use App\Domains\Book\Models\Book;
use App\Domains\Book\Repositories\BookRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class BookService
{
    public function __construct(private readonly BookRepository $bookRepository)
    {
    }

    public function index(?string $search, ?string $genre): array
    {
        return [
            'libros' => $this->bookRepository->paginateWithFilters($search, $genre),
            'generos' => $this->bookRepository->allGenres(),
        ];
    }

    public function formData(): array
    {
        return [
            'autores' => Author::orderBy('nombre')->pluck('nombre', 'id'),
            'generos' => $this->bookRepository->allGenres(),
        ];
    }

    public function show(Book $book): Book
    {
        $book->load('autor');

        return $book;
    }

    public function store(array $data, ?UploadedFile $cover): Book
    {
        return $this->bookRepository->create($data, $cover);
    }

    public function update(Book $book, array $data, ?UploadedFile $cover): Book
    {
        return $this->bookRepository->update($book, $data, $cover);
    }

    public function destroy(Book $book): void
    {
        $this->bookRepository->delete($book);
    }

    public function storeRules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', 'unique:libros,isbn'],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ];
    }

    public function updateRules(Book $book): array
    {
        return [
            'titulo' => ['required', 'string', 'max:160'],
            'descripcion' => ['nullable', 'string', 'max:3000'],
            'fecha_publicacion' => ['nullable', 'date'],
            'genero' => ['nullable', 'exists:generos,nombre'],
            'isbn' => ['required', 'string', 'max:25', Rule::unique('libros', 'isbn')->ignore($book->id)],
            'portada' => ['nullable', 'image', 'max:2048'],
            'autor_id' => ['required', 'exists:autors,id'],
        ];
    }
}
