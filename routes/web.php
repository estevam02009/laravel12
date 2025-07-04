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
Route::get('/list-colaboradores', [ColaboradorController::class, 'index'])->name('colaborador.list');
