<?php

use App\Http\Controllers\MCityController;
use Illuminate\Support\Facades\Route;

Route::get('prefectures/{prefecture}/cities', [MCityController::class, 'getByPrefecture']);