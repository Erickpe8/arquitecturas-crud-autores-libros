<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Core\Domain\AuthorSummary;
use App\Core\Domain\Book;
use App\Core\Pagination\PaginatedResult;
use App\Core\Ports\Outbound\BookRepositoryPort;
use App\Core\Ports\Outbound\CoverStoragePort;
use App\Models\Autor as AutorModel;
use App\Models\Genero as GeneroModel;
use App\Models\Libro as LibroModel;
use Illuminate\Support\Facades\Request;

final class EloquentBookRepository implements BookRepositoryPort
{
    public function __construct(private readonly CoverStoragePort $coverStorage) {}

    public function paginateWithFilters(?string $search, ?string $genre): PaginatedResult
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

        return new PaginatedResult(
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

    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, portada?: ?string, autor_id: int}  $data
     */
    public function create(array $data): void
    {
        LibroModel::create($data);
    }

    public function findWithAuthor(int $id): ?Book
    {
        $model = LibroModel::with('autor')->find($id);

        if ($model === null) {
            return null;
        }

        return $this->mapWithAuthor($model);
    }

    /**
     * @param  array{titulo: string, descripcion?: ?string, fecha_publicacion?: ?string, genero?: ?string, isbn: string, autor_id: int, portada?: ?string}  $data
     */
    public function update(int $id, array $data): void
    {
        $model = LibroModel::findOrFail($id);

        if (array_key_exists('portada', $data) && $data['portada'] !== null) {
            $this->coverStorage->deleteIfExists($model->portada);
        }

        $model->update($data);
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
