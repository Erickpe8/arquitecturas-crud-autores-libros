<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalAutores = Autor::count();
    $totalLibros = Libro::count();
    $generoMasRegistrado = Libro::query()
        ->select('genero')
        ->whereNotNull('genero')
        ->where('genero', '!=', '')
        ->groupBy('genero')
        ->orderByRaw('COUNT(*) DESC')
        ->value('genero');

    return view('dashboard', compact('totalAutores', 'totalLibros', 'generoMasRegistrado'));
})->name('dashboard');

Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);
