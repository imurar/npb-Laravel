<?php

use Illuminate\Support\Facades\Route;

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

