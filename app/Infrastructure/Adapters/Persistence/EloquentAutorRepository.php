<?php

namespace App\Infrastructure\Adapters\Persistence;

use App\Domain\Autor\Entities\Autor;
use App\Domain\Autor\Contracts\AutorRepositoryInterface;

class EloquentAutorRepository implements AutorRepositoryInterface
{
    public function all()
    {
        return Autor::withCount('libros')->get();

    }

    public function find(int $id)
    {
        return Autor::findOrFail($id);
    }

    public function create(array $data)
    {
        return Autor::create($data);
    }

    public function update(int $id, array $data)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($data);
        return $autor;
    }

    public function delete(int $id)
    {
        $autor = Autor::findOrFail($id);
        return $autor->delete();
    }


}