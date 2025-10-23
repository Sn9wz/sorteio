<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\SorteioController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro', [cadastroController::class, 'index']);
Route::post('/cadastro', [CadastroController::class, 'store']);
Route::get('/sortear', [SorteioController::class, 'index']);
Route::post('/sortear', [SorteioController::class, 'sortear']);