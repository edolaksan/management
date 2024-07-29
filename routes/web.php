<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('labels', LabelController::class)->middleware('auth:sanctum');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/home', function () {
    return view('home');
});
Route::post('/api/login', [AuthController::class, 'login'])->name('login.attempt');

// Routes untuk labels
    Route::get('/labels/create', [LabelController::class, 'create'])->name('labels.create');
    Route::post('/labels', [LabelController::class, 'store'])->name('labels.store');
    Route::get('/labels/{id}/edit', [LabelController::class, 'edit'])->name('labels.edit');
    Route::put('/labels/{id}', [LabelController::class, 'update'])->name('labels.update');
