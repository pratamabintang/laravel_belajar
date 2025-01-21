<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/form', [AuthController::class, 'register']);

Route::post('/welcome', [AuthController::class, 'submit_form']);