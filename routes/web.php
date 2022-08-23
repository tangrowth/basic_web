<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/', [TaskController::class, 'post']);
Route::post('/edit/{id}',[TaskController::class, 'edit']);
Route::post('/delete/{id}', [TaskController::class, 'delete']);
