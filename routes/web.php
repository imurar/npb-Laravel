<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MTeamController;
use App\Http\Controllers\MPlayerController;
use App\Http\Controllers\TPlayerController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('top');
}) -> name('top');

//MTeam
Route::get('/teams', [MTeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team_id}', [MTeamController::class, 'show'])->name('teams.show');

//TPlayer
Route::get('/teams/{team_id}/players', [TPlayerController::class, 'index'])->name('players.index'); //所属選手一覧
Route::get('/teams/{team_id}/players/create', [TPlayerController::class, 'create'])->name('players.create');
Route::post('/teams/{team_id}/players', [TPlayerController::class, 'store'])->name('players.store');
Route::get('/teams/{team_id}/players/{player_id}', [TPlayerController::class, 'show'])->name('players.show');
Route::get('/teams/{team_id}/players/{player_id}/edit', [TPlayerController::class, 'edit'])->name('players.edit');
Route::put('/teams/{team_id}/players/{player_id}', [TPlayerController::class, 'update'])->name('players.update');

//↓後で削除
//Route::get('/players', [MPlayerController::class, 'index'])->name('players.index');
//Route::get('/players/create', [MPlayerController::class, 'create'])->name('players.create');
//Route::post('/players',[MPlayerController::class, 'store'])->name('players.store');


