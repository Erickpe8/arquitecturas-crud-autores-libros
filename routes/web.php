<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Services\AuthorService;
use App\Services\BookService;
use Illuminate\Support\Facades\Route;

Route::get('/', function (AuthorService $authors, BookService $books) {
    $totalAutores = $authors->countAll();
    $totalLibros = $books->countAll();
    $generoMasRegistrado = $books->mostRegisteredGenreName();

    return view('dashboard', compact('totalAutores', 'totalLibros', 'generoMasRegistrado'));
})->name('dashboard');

Route::resource('autores', AutorController::class)->parameters([
    'autores' => 'autor',
]);
Route::resource('libros', LibroController::class);
