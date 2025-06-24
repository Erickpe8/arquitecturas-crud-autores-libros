<?php

namespace App\Infrastructure\Adapters\Persistence;

use App\Domain\Entities\Libro;
use App\Domain\Contracts\LibroRepositoryInterface;

class EloquentLibroRepository implements LibroRepositoryInterface
{
    public function all()
    {
        return Libro::with('autor')->get();
    }

    public function find($id)
    {
        return Libro::findOrFail($id);
    }

    public function create(array $data)
    {
        return Libro::create($data);
    }

    public function update($id, array $data)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($data);
        return $libro;
    }

    public function delete($id)
    {
        return Libro::destroy($id);
    }
}