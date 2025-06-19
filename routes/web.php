<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;  


Route::get('/', function () {
    return view('index');
});
Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);

