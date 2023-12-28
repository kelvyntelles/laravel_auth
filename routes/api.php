<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefaController;

Route::get('/tarefa', [TarefaController::class, 'index'])->middleware('auth:sanctum');
Route::post('/tarefa', [TarefaController::class, 'store']);
Route::get('/tarefa/{id}', [TarefaController::class, 'show']);
Route::put('/tarefa/{id}', [TarefaController::class, 'update']);
Route::delete('/tarefa/{id}', [TarefaController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
