<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MTeamController;
use App\Http\Controllers\MPlayerController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('top');
}) -> name('top');

Route::get('/teams', [MTeamController::class, 'index'])->name('teams.index');

Route::get('/players', [MPlayerController::class, 'index'])->name('players.index');
Route::get('/players/create', [MPlayerController::class, 'create'])->name('players.create');
Route::post('/players',[MPlayerController::class, 'store'])->name('players.store');