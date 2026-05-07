<?php

namespace App\Interfaces\Storage;

interface CoverStorageInterface
{
    /**
     * @param  object  $uploadedFile  típicamente Symfony UploadedFile / Laravel UploadedFile
     */
    public function storeFromUploaded(object $uploadedFile): string;

    public function deleteIfExists(?string $relativePath): void;
}
