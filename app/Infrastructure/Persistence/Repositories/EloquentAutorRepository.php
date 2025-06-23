<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Autor\Models\Autor;
use App\Domain\Autor\Repositories\AutorRepositoryInterface;

class EloquentAutorRepository implements AutorRepositoryInterface
{
    public function all()
    {
        return Autor::all();
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
