<?php

namespace App\Core\Ports\Outbound;

/**
 * Puerto saliente: almacenamiento de archivos de portada.
 * La infraestructura adapta Laravel Filesystem / UploadedFile.
 */
interface CoverStoragePort
{
    /**
     * @param  object  $uploadedFile  fichero subido (p. ej. UploadedFile de Symfony/Laravel)
     */
    public function storeFromUploaded(object $uploadedFile): string;

    public function deleteIfExists(?string $relativePath): void;
}
