<?php

use App\Domains\Author\Controllers\AuthorController;
use App\Domains\Author\Models\Author;
use App\Domains\Book\Controllers\BookController;
use App\Domains\Book\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalAutores = Author::count();
    $totalLibros = Book::count();
    $generoMasRegistrado = Book::query()
        ->select('genero')
        ->whereNotNull('genero')
        ->where('genero', '!=', '')
        ->groupBy('genero')
        ->orderByRaw('COUNT(*) DESC')
        ->value('genero');

    return view('dashboard', compact('totalAutores', 'totalLibros', 'generoMasRegistrado'));
})->name('dashboard');

Route::resource('autores', AuthorController::class)->parameters([
    'autores' => 'autor',
]);
Route::resource('libros', BookController::class);
