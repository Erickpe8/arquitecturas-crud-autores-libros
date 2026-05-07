<?php

namespace App\Infrastructure\Storage;

use App\Interfaces\Storage\CoverStorageInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class LaravelCoverStorage implements CoverStorageInterface
{
    public function storeFromUploaded(object $uploadedFile): string
    {
        if (! $uploadedFile instanceof UploadedFile) {
            throw new \InvalidArgumentException('Se esperaba UploadedFile');
        }

        return $uploadedFile->store('portadas', 'public');
    }

    public function deleteIfExists(?string $relativePath): void
    {
        if ($relativePath && Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }
}
