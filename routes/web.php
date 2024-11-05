<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EspacoController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/espaco', [EspacoController::class, 'index']);
Route::get('/espaco/novo', [EspacoController::class, 'novo']);
Route::get('/espaco/{$id}', [EspacoController::class, 'show']);
Route::get('/espaco/create_plano', [EspacoController::class, 'create_plano']);
Route::post('/espaco', [EspacoController::class, 'store']);
Route::get('/salao/',[EspacoController::class,'InfoEspacos']);
Route::get('/sobre',[HomeController::class,'sobre']);
Route::get('/agendar', function () {
    return view('agendar');
});

