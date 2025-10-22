<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro', [cadastroController::class, 'index']);
Route::post('/cadastro', [CadastroController::class, 'store']);
Route::delete('/cadastro', [CadastroController::class, 'delete']);