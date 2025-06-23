<?php

namespace App\Repositories\Eloquent;

use App\Models\Autor;
use App\Repositories\Interfaces\AutorRepositoryInterface;

class AutorRepository implements AutorRepositoryInterface
{
    public function all()
    {
        return Autor::withCount('libros')->get();
    }

    public function find($id)
    {
        return Autor::findOrFail($id);
    }

    public function create(array $data)
    {
        return Autor::create($data);
    }

    public function update($id, array $data)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($data);
        return $autor;
    }

    public function delete($id)
    {
        return Autor::destroy($id);
    }
}
