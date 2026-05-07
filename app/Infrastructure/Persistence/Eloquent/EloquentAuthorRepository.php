<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Core\Domain\Author;
use App\Core\Domain\Book;
use App\Core\Pagination\PaginatedResult;
use App\Core\Ports\Outbound\AuthorRepositoryPort;
use App\Models\Autor as AutorModel;
use Illuminate\Support\Facades\Request;

final class EloquentAuthorRepository implements AuthorRepositoryPort
{
    public function paginateWithSearch(?string $search): PaginatedResult
    {
        $paginator = AutorModel::withCount('libros')
            ->when($search, fn ($query) => $query->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate(24)
            ->withQueryString();

        $items = $paginator->getCollection()
            ->map(fn (AutorModel $m) => $this->mapListItem($m))
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

    /**
     * @param  array{nombre: string, nacionalidad?: ?string, fecha_nacimiento?: ?string, biografia?: ?string}  $data
     */
    public function create(array $data): Author
    {
        $model = AutorModel::create($data);

        return $this->mapWithoutRelations($model);
    }

    public function findWithBooks(int $id): ?Author
    {
        $model = AutorModel::with(['libros' => fn ($q) => $q->latest('fecha_publicacion')])
            ->find($id);

        if ($model === null) {
            return null;
        }

        $libros = $model->libros->map(fn ($l) => $this->mapBookCompact($l))->all();

        return new Author(
            id: (int) $model->id,
            nombre: $model->nombre,
            nacionalidad: $model->nacionalidad,
            fecha_nacimiento: EloquentDate::toYmd($model->fecha_nacimiento),
            biografia: $model->biografia,
            librosCount: null,
            libros: $libros,
        );
    }

    /**
     * @param  array{nombre: string, nacionalidad?: ?string, fecha_nacimiento?: ?string, biografia?: ?string}  $data
     */
    public function update(int $id, array $data): Author
    {
        $model = AutorModel::findOrFail($id);
        $model->update($data);

        return $this->mapWithoutRelations($model->fresh());
    }

    public function delete(int $id): void
    {
        AutorModel::destroy($id);
    }

    public function countAll(): int
    {
        return AutorModel::count();
    }

    private function mapListItem(AutorModel $model): Author
    {
        return new Author(
            id: (int) $model->id,
            nombre: $model->nombre,
            nacionalidad: $model->nacionalidad,
            fecha_nacimiento: EloquentDate::toYmd($model->fecha_nacimiento),
            biografia: $model->biografia,
            librosCount: (int) ($model->libros_count ?? 0),
            libros: null,
        );
    }

    private function mapWithoutRelations(AutorModel $model): Author
    {
        return new Author(
            id: (int) $model->id,
            nombre: $model->nombre,
            nacionalidad: $model->nacionalidad,
            fecha_nacimiento: EloquentDate::toYmd($model->fecha_nacimiento),
            biografia: $model->biografia,
            librosCount: null,
            libros: null,
        );
    }

    private function mapBookCompact(\App\Models\Libro $model): Book
    {
        return new Book(
            id: (int) $model->id,
            titulo: $model->titulo,
            descripcion: $model->descripcion,
            fecha_publicacion: EloquentDate::toYmd($model->fecha_publicacion),
            genero: $model->genero,
            isbn: $model->isbn,
            portada: $model->portada,
            autor_id: (int) $model->autor_id,
            autor: null,
        );
    }
}
