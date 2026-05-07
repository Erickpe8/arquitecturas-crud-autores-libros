<?php

namespace App\Handlers\Books;

use App\Commands\Books\DeleteBookCommand;
use App\Models\Libro;
use Illuminate\Support\Facades\Storage;

final class DeleteBookCommandHandler
{
    public function handle(DeleteBookCommand $command): void
    {
        $libro = Libro::findOrFail($command->bookId);

        if ($libro->portada && Storage::disk('public')->exists($libro->portada)) {
            Storage::disk('public')->delete($libro->portada);
        }

        $libro->delete();
    }
}
