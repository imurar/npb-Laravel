<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MTeamController;
use App\Http\Controllers\TPlayerController;
use App\Http\Controllers\TFavoriteController;


/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/top', function () {
    return Inertia::render('Top');
})->name('top');

// MTeam
Route::get('/teams', [MTeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team_id}', [MTeamController::class, 'show'])->name('teams.show');

// TPlayer
Route::prefix('teams/{team_id}/players')->group(function () {
    Route::get('/', [TPlayerController::class, 'index'])->name('players.index');
    Route::get('/create', [TPlayerController::class, 'create'])->name('players.create');
    Route::post('/', [TPlayerController::class, 'store'])->name('players.store');
    Route::get('/deleted', [TPlayerController::class, 'deleted'])->name('players.deleted');
    Route::get('/{player_id}', [TPlayerController::class, 'show'])->name('players.show');
    Route::get('/{player_id}/edit', [TPlayerController::class, 'edit'])->name('players.edit');
    Route::put('/{player_id}', [TPlayerController::class, 'update'])->name('players.update');
    Route::delete('/{player_id}', [TPlayerController::class, 'destroy'])->name('players.destroy');
    Route::post('/{player_id}/restore', [TPlayerController::class, 'restore'])->name('players.restore');
});

require __DIR__.'/auth.php';
