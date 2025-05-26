<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MTeamController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('top');
}) -> name('top');

Route::get('/sato8', function() {
    return view('sato8');
}) -> name('satoteru');

Route::get('/teams/create', [MTeamController::class, 'createTeams']) -> name('teams/create');
Route::get('/teams', [MTeamController::class, 'listTeams']) -> name('teams');