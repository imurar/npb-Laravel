<?php

use App\Http\Controllers\MTeamController;
use App\Http\Controllers\MPlayerController;
use App\Http\Controllers\TPlayerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return view('top');
}) -> name('top');

//MTeam
Route::get('/teams', [MTeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team_id}', [MTeamController::class, 'show'])->name('teams.show');

//TPlayer
Route::get('/teams/{team_id}/players', [TPlayerController::class, 'index'])->name('players.index');
Route::get('/teams/{team_id}/players/create', [TPlayerController::class, 'create'])->name('players.create');
Route::post('/teams/{team_id}/players', [TPlayerController::class, 'store'])->name('players.store');
Route::get('/teams/{team_id}/players/deleted', [TPlayerController::class, 'deleted'])->name('players.deleted');
Route::get('/teams/{team_id}/players/{player_id}', [TPlayerController::class, 'show'])->name('players.show');
Route::get('/teams/{team_id}/players/{player_id}/edit', [TPlayerController::class, 'edit'])->name('players.edit');
Route::put('/teams/{team_id}/players/{player_id}', [TPlayerController::class, 'update'])->name('players.update');
Route::delete('/teams/{team_id}/players/{player_id}', [TPlayerController::class, 'destroy'])->name('players.destroy');
Route::post('/teams/{team_id}/players/{player_id}/restore', [TPlayerController::class, 'restore'])->name('players.restore');


require __DIR__.'/auth.php';
