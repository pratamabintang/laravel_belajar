<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;
use App\Models\films;

Route::get('/', function () {
    $data = films::all();
    return view('film.show', compact('data'));
});

Route::get('/master', function () {
    return view('layout/master');
});

//CRUD CAST
use App\Http\Middleware\EnsureTokenIsValid;
 
Route::middleware(['auth'])->group(function () {
    Route::get('/cast/create', [CastController::class, 'create']);
    Route::post('/cast', [CastController::class, 'store']);
    Route::get('/cast', [CastController::class, 'index']);
    Route::get('/cast/{cast_id}', [CastController::class, 'show']);
    Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
    Route::put('/cast/{cast_id}', [CastController::class, 'update']);
    Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
});

//CRUD GENRE
Route::resource('genre', GenreController::class);

//CRUD FILM 
Route::resource('film', FilmController::class);
Auth::routes();

Route::post('/film/{id}/review', [FilmController::class, 'storeReview'])->name('film.storeReview');