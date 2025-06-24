<?php

namespace App\Domain\Libro\Services;

use App\Domain\Libro\Contracts\LibroRepositoryInterface;

class LibroService
{
    protected $libroRepository;

    /**
     * Inyecta el repositorio de libros.
     * Entrada: una instancia de LibroRepositoryInterface.
     * Salida: no retorna valor.
     */
    public function __construct(LibroRepositoryInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    /**
     * Obtiene todos los libros registrados.
     * Entrada: ninguna.
     * Salida: colección o lista de libros.
     */
    public function getAll()
    {
        return $this->libroRepository->all();
    }

    /**
     * Crea un nuevo libro.
     * Entrada: array con datos como título, género y autor_id.
     * Salida: libro creado.
     */
    public function create(array $data)
    {
        return $this->libroRepository->create($data);
    }

    /**
     * Busca un libro por su ID.
     * Entrada: ID numérico del libro.
     * Salida: libro encontrado o error si no existe.
     */
    public function find($id)
    {
        return $this->libroRepository->find($id);
    }

    /**
     * Actualiza los datos de un libro existente.
     * Entrada: ID del libro y array con los nuevos datos.
     * Salida: libro actualizado o resultado del intento.
     */
    public function update($id, array $data)
    {
        return $this->libroRepository->update($id, $data);
    }

    /**
     * Elimina un libro.
     * Entrada: ID del libro a eliminar.
     * Salida: true si se eliminó, false si falló.
     */
    public function delete($id)
    {
        return $this->libroRepository->delete($id);
    }
}
