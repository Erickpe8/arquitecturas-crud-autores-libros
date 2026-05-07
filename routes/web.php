<?php

use App\Handlers\Dashboard\GetDashboardStatsQueryHandler;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Queries\Dashboard\GetDashboardStatsQuery;
use Illuminate\Support\Facades\Route;

Route::get('/', function (GetDashboardStatsQueryHandler $handler) {
    extract($handler->handle(new GetDashboardStatsQuery));

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
