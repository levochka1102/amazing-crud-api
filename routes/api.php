<?php

use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\GenresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('genres/all', [GenresController::class, 'all']);
Route::apiResource('genres', GenresController::class);

Route::get('developers/all', [DevelopersController::class, 'all']);
Route::apiResource('developers', DevelopersController::class);

Route::apiResource('games', GamesController::class);
