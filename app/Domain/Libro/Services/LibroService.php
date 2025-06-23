<?php

namespace App\Services;

use App\Repositories\Interfaces\LibroRepositoryInterface;

class LibroService
{
    protected $libroRepository;

    /**
     * Inyecta el repositorio de libros.
     *
     * @param LibroRepositoryInterface $libroRepository
     */
    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    /**
     * Retorna todos los libros.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->libroRepository->all();
    }

    /**
     * Crea un nuevo libro con los datos dados.
     *
     * @param array $data
     * @return \App\Models\Libro
     */
    public function create(array $data)
    {
        return $this->libroRepository->create($data);
    }

    /**
     * Retorna un libro por su ID.
     *
     * @param int $id
     * @return \App\Models\Libro|null
     */
    public function find($id)
    {
        return $this->libroRepository->find($id);
    }

    /**
     * Actualiza un libro con nuevos datos.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data)
    {
        return $this->libroRepository->update($id, $data);
    }

    /**
     * Elimina un libro por su ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->libroRepository->delete($id);
    }
}
