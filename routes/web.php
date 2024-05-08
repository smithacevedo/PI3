<?php

use App\Http\Controllers\BiblioTecController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;


Route::get('/', function () {
    return view('home');
});

Route::resource('biblioTec', 'App\Http\Controllers\BiblioTecController');


Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');


Route::get('/login', [SessionController::class, 'create'])->name('login.index');

Route::post('/login', [SessionController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');
Route::resource('layouts', BiblioTecController::class);
Route::resource('libro', LibroController::class);
Route::resource('autor', AutorController::class);
Route::get('imprimirAutores', 'App\http\Controllers\PdfController@imprimirAutor')->name('imprimirAutores');
Route::get('imprimirLibros', 'App\http\Controllers\PdfController@imprimirLibro')->name('imprimirLibros');
