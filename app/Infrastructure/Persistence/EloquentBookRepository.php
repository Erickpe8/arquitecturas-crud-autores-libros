<?php

namespace App\Infrastructure\Persistence;

use App\DTOs\BookWriteDto;
use App\DTOs\Pagination\PageResult;
use App\Entities\AuthorSummary;
use App\Entities\Book;
use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Interfaces\Storage\CoverStorageInterface;
use App\Models\Autor as AutorModel;
use App\Models\Genero as GeneroModel;
use App\Models\Libro as LibroModel;
use Illuminate\Support\Facades\Request;

final class EloquentBookRepository implements BookRepositoryInterface
{
    public function __construct(private readonly CoverStorageInterface $coverStorage) {}

    public function paginateWithFilters(?string $search, ?string $genre): PageResult
    {
        $paginator = LibroModel::with('autor')
            ->when($search, fn ($query) => $query->where('titulo', 'like', "%{$search}%"))
            ->when($genre, fn ($query) => $query->where('genero', $genre))
            ->latest()
            ->paginate(24)
            ->withQueryString();

        $items = $paginator->getCollection()
            ->map(fn (LibroModel $m) => $this->mapWithAuthor($m))
            ->values()
            ->all();

        return new PageResult(
            items: $items,
            total: $paginator->total(),
            perPage: $paginator->perPage(),
            currentPage: $paginator->currentPage(),
            path: $paginator->path(),
            query: Request::query(),
        );
    }

    public function listGenreNames(): array
    {
        return GeneroModel::query()
            ->orderBy('nombre')
            ->pluck('nombre')
            ->values()
            ->all();
    }

    public function listAuthorsForSelect(): array
    {
        return AutorModel::query()
            ->orderBy('nombre')
            ->pluck('nombre', 'id')
            ->all();
    }

    public function create(BookWriteDto $dto): void
    {
        LibroModel::create($dto->fields);
    }

    public function findWithAuthor(int $id): ?Book
    {
        $model = LibroModel::with('autor')->find($id);

        if ($model === null) {
            return null;
        }

        return $this->mapWithAuthor($model);
    }

    public function update(int $id, BookWriteDto $dto): Book
    {
        $model = LibroModel::findOrFail($id);
        $fields = $dto->fields;

        if (array_key_exists('portada', $fields) && $fields['portada'] !== null) {
            $this->coverStorage->deleteIfExists($model->portada);
        }

        $model->update($fields);

        return $this->mapWithAuthor($model->fresh()->load('autor'));
    }

    public function delete(int $id): void
    {
        $model = LibroModel::find($id);

        if ($model === null) {
            return;
        }

        $this->coverStorage->deleteIfExists($model->portada);
        $model->delete();
    }

    public function countAll(): int
    {
        return LibroModel::count();
    }

    public function mostRegisteredGenreName(): ?string
    {
        return LibroModel::query()
            ->select('genero')
            ->whereNotNull('genero')
            ->where('genero', '!=', '')
            ->groupBy('genero')
            ->orderByRaw('COUNT(*) DESC')
            ->value('genero');
    }

    private function mapWithAuthor(LibroModel $model): Book
    {
        $autor = $model->relationLoaded('autor') && $model->autor
            ? new AuthorSummary((int) $model->autor->id, $model->autor->nombre)
            : null;

        return new Book(
            id: (int) $model->id,
            titulo: $model->titulo,
            descripcion: $model->descripcion,
            fecha_publicacion: EloquentDate::toYmd($model->fecha_publicacion),
            genero: $model->genero,
            isbn: $model->isbn,
            portada: $model->portada,
            autor_id: (int) $model->autor_id,
            autor: $autor,
        );
    }
}
