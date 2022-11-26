<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
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

Route::get('genre/all', [GenreController::class, 'all']);
Route::get('developer/all', [DeveloperController::class, 'all']);
Route::apiResource('genre', GenreController::class);
Route::apiResource('developer', DeveloperController::class);
Route::apiResource('game', GameController::class);
