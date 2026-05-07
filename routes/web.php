<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\UseCases\Dashboard\GetDashboardStatsUseCase;
use Illuminate\Support\Facades\Route;

Route::get('/', function (GetDashboardStatsUseCase $stats) {
    $d = $stats->execute();

    return view('dashboard', [
        'totalAutores' => $d->totalAutores,
        'totalLibros' => $d->totalLibros,
        'generoMasRegistrado' => $d->generoMasRegistrado,
    ]);
})->name('dashboard');

Route::resource('autores', AutorController::class)->parameters([
    'autores' => 'autor',
]);
Route::resource('libros', LibroController::class);
