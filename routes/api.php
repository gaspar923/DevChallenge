<?php

use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('competitions/{page?}', [CompetitionController::class, 'index']);
Route::get('competitions/{competition_id}', [CompetitionController::class, 'show']);

// Route::get('teams/{page?}', [CompetitionController::class, 'index']);
// Route::get('teams/{team_id}', [TeamController::class, 'show']);

Route::get('team/{page?}', [TeamController::class, 'index']);
Route::get('team/{team_id}', [TeamController::class, 'show']);

// Route::get('players', [PlayerController::class, 'all']);

Route::get('players/{page?}', [PlayerController::class, 'index']);
Route::get('players/{team_id}', [PlayerController::class, 'show']);
