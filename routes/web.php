<?php

use App\Http\Controllers\Web\CompetitionController;
use App\Http\Controllers\Web\PlayerController;
use App\Http\Controllers\Web\TeamController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return Redirect::route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // return Inertia::render('Dashboard');
        return Redirect::route('competition.index');
    })->name('dashboard');

    Route::resource('user', UserController::class);
    Route::post('user/deactivate/{user}', [UserController::class, 'deactivate'])->name('user.deactivate');

    Route::resource('competition', CompetitionController::class);
    Route::resource('team', TeamController::class);
    Route::resource('player', PlayerController::class);
});

// Route::resource('competition', CompetitionController::class);
