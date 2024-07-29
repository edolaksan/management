<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\AuthController;

// Route untuk login
Route::post('/login', [AuthController::class, 'login']);

// Routes yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/labels', [LabelController::class, 'index']);
    Route::post('/labels', [LabelController::class, 'store']);
    Route::get('/labels/{id}', [LabelController::class, 'show']);
    Route::put('/labels/{id}', [LabelController::class, 'update']);
    Route::delete('/labels/{id}', [LabelController::class, 'destroy']);
});
