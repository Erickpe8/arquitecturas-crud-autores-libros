<?php

namespace App\Handlers\Books;

use App\Commands\Books\UpdateBookCommand;
use App\Models\Libro;
use Illuminate\Support\Facades\Storage;

final class UpdateBookCommandHandler
{
    public function handle(UpdateBookCommand $command): Libro
    {
        $libro = Libro::findOrFail($command->bookId);
        $data = $command->payload;

        if (array_key_exists('portada', $data) && $data['portada'] !== null) {
            if ($libro->portada && Storage::disk('public')->exists($libro->portada)) {
                Storage::disk('public')->delete($libro->portada);
            }
        }

        $libro->update($data);

        return $libro->fresh();
    }
}
