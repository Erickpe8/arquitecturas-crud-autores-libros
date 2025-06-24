<?php

namespace App\Services;

use App\Domain\Contracts\AutorRepositoryInterface;



class AutorService
{
    protected $autorRepository;

    /**
     * Inyecta el repositorio de autores.
     * Entrada: una instancia de AutorRepositoryInterface.
     * Salida: no retorna valor.
     */
    public function __construct(AutorRepositoryInterface $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    /**
     * Obtiene todos los autores registrados.
     * Entrada: ninguna.
     * Salida: colección o lista de autores.
     */
    public function getAll()
    {
        return $this->autorRepository->all();
    }

    /**
     * Crea un nuevo autor.
     * Entrada: array con datos como nombre y apellido.
     * Salida: autor creado.
     */
    public function create(array $data)
    {
        return $this->autorRepository->create($data);
    }

    /**
     * Busca un autor por su ID.
     * Entrada: ID numérico del autor.
     * Salida: autor encontrado o error si no existe.
     */
    public function find($id)
    {
        return $this->autorRepository->find($id);
    }

    /**
     * Actualiza los datos de un autor existente.
     * Entrada: ID del autor y array con los nuevos datos.
     * Salida: autor actualizado o resultado del intento.
     */
    public function update($id, array $data)
    {
        return $this->autorRepository->update($id, $data);
    }

    /**
     * Elimina un autor.
     * Entrada: ID del autor a eliminar.
     * Salida: true si se eliminó, false si falló.
     */
    public function delete($id)
    {
        return $this->autorRepository->delete($id);
    }
}
