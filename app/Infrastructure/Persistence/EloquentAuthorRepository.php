<?php

namespace App\Infrastructure\Persistence;

use App\DTOs\AuthorWriteDto;
use App\DTOs\Pagination\PageResult;
use App\Entities\Author;
use App\Entities\Book;
use App\Interfaces\Repositories\AuthorRepositoryInterface;
use App\Models\Autor as AutorModel;
use Illuminate\Support\Facades\Request;

final class EloquentAuthorRepository implements AuthorRepositoryInterface
{
    public function paginateWithSearch(?string $search): PageResult
    {
        $paginator = AutorModel::withCount('libros')
            ->when($search, fn ($q) => $q->where('nombre', 'like', "%{$search}%"))
            ->orderBy('nombre')
            ->paginate(24)
            ->withQueryString();

        $items = $paginator->getCollection()
            ->map(fn (AutorModel $m) => $this->mapListRow($m))
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

    public function create(AuthorWriteDto $dto): Author
    {
        $model = AutorModel::create([
            'nombre' => $dto->nombre,
            'nacionalidad' => $dto->nacionalidad,
            'fecha_nacimiento' => $dto->fecha_nacimiento,
            'biografia' => $dto->biografia,
        ]);

        return $this->mapBare($model);
    }

    public function find(int $id): ?Author
    {
        $model = AutorModel::find($id);

        return $model === null ? null : $this->mapBare($model);
    }

    public function findWithBooks(int $id): ?Author
    {
        $model = AutorModel::find($id);

        if ($model === null) {
            return null;
        }

        $libros = $model->libros()->latest('fecha_publicacion')->get()
            ->map(fn ($l) => $this->mapBookRow($l))
            ->all();

        return new Author(
            id: (int) $model->id,
            nombre: $model->nombre,
            nacionalidad: $model->nacionalidad,
            fecha_nacimiento: EloquentDate::toYmd($model->fecha_nacimiento),
            biografia: $model->biografia,
            librosCount: null,
            books: $libros,
        );
    }

    public function update(int $id, AuthorWriteDto $dto): Author
    {
        $model = AutorModel::findOrFail($id);
        $model->update([
            'nombre' => $dto->nombre,
            'nacionalidad' => $dto->nacionalidad,
            'fecha_nacimiento' => $dto->fecha_nacimiento,
            'biografia' => $dto->biografia,
        ]);

        return $this->mapBare($model->fresh());
    }

    public function delete(int $id): void
    {
        AutorModel::destroy($id);
    }

    public function countAll(): int
    {
        return AutorModel::count();
    }

    private function mapListRow(AutorModel $model): Author
    {
        return new Author(
            id: (int) $model->id,
            nombre: $model->nombre,
            nacionalidad: $model->nacionalidad,
            fecha_nacimiento: EloquentDate::toYmd($model->fecha_nacimiento),
            biografia: $model->biografia,
            librosCount: (int) ($model->libros_count ?? 0),
            books: null,
        );
    }

    private function mapBare(AutorModel $model): Author
    {
        return new Author(
            id: (int) $model->id,
            nombre: $model->nombre,
            nacionalidad: $model->nacionalidad,
            fecha_nacimiento: EloquentDate::toYmd($model->fecha_nacimiento),
            biografia: $model->biografia,
            librosCount: null,
            books: null,
        );
    }

    private function mapBookRow(\App\Models\Libro $model): Book
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
