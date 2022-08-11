<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;


// All movies route
Route::get('/', [MoviesController::class, 'index']);
// single movie route
Route::get('/movie/{movie}', [MoviesController::class, 'show']);
