<?php

use App\Http\Controllers\Api\PlayerController;

Route::prefix('players')->group(function () {
    Route::get('/', [PlayerController::class, 'index']);
    Route::get('{id}', [PlayerController::class, 'show']);
});