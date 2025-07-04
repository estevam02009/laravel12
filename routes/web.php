<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ColaboradorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-colaboradores', [ColaboradorController::class, 'create'])->name('colaborador.create');
Route::get('/create-colaboradores', [ColaboradorController::class, 'create'])->name('colaborador.create');
Route::get('/detalhes-colaborador/{id}', [ColaboradorController::class, 'show'])->name('colaborador.detalhes');
Route::get('/list-colaboradores', [ColaboradorController::class, 'index'])->name('colaborador.list');
Route::post('/colaboradores-store', [ColaboradorController::class, 'store'])->name('colaborador.store');
