<?php

namespace App\Services;

use App\Repositories\Interfaces\AutorRepositoryInterface;

class AutorService
{
    protected $autorRepository;

    /**
     * Inyecta el repositorio de autores.
     *
     * @param AutorRepositoryInterface $autorRepository
     */
    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    /**
     * Retorna todos los autores.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->autorRepository->all();
    }

    /**
     * Crea un nuevo autor con los datos dados.
     *
     * @param array $data
     * @return \App\Models\Autor
     */
    public function create(array $data)
    {
        return $this->autorRepository->create($data);
    }

    /**
     * Retorna un autor por su ID.
     *
     * @param int $id
     * @return \App\Models\Autor|null
     */
    public function find($id)
    {
        return $this->autorRepository->find($id);
    }

    /**
     * Actualiza un autor con nuevos datos.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data)
    {
        return $this->autorRepository->update($id, $data);
    }

    /**
     * Elimina un autor por su ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->autorRepository->delete($id);
    }
}
