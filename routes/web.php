<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Web\Controllers\LibroController;
use App\Interfaces\Web\Controllers\AutorController;


Route::get('/', function () {
    return view('index');
});
Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);