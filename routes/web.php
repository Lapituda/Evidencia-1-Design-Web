<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('diarios', App\Http\Controllers\DiarioController::class);
Route::resource('comentarios', App\Http\Controllers\ComentarioController::class);