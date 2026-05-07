<?php

use App\Application\Dashboard\GetDashboardStatsUseCase;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (GetDashboardStatsUseCase $stats) {
    extract($stats->execute());

    return view('dashboard', [
        'totalAutores' => $totalAutores,
        'totalLibros' => $totalLibros,
        'generoMasRegistrado' => $generoMasRegistrado,
    ]);
})->name('dashboard');

Route::resource('autores', AutorController::class)->parameters([
    'autores' => 'autor',
]);
Route::resource('libros', LibroController::class);
