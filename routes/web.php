<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/form', [AuthController::class, 'register']);

Route::post('/welcome', [AuthController::class, 'submit_form']);

Route::get('/master', function () {
    return view('layout/master');
});

Route::get('/table', function () {
    return view('pages/table');
});

Route::get('/data-table', function () {
    return view('pages/data-table');
});

Route::get('/cast/create', [CastController::class, 'create']);
Route::post('/cast', [CastController::class, 'store']);
Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/{cast_id}', [CastController::class, 'show']);
Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
Route::put('/cast/{cast_id}', [CastController::class, 'update']);
Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);