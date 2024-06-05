<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EspacoController;

Route::get('/', [AdminController::class, 'index']);

Route::get('/espaco', [EspacoController::class, 'index']);
Route::get('/espaco/novo', [EspacoController::class, 'novo']);
Route::get('/espaco/novo_plano', [EspacoController::class, 'novo_plano']);
Route::post('/espaco', [EspacoController::class, 'store']);

Route::get('/agendar', function () {
    return view('agendar');
});
