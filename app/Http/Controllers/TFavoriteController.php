<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TFavorite;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class TFavoriteController extends Controller
{
    public function index(){
        $user = Auth::user();

        $players = $user->favoritePlayers()
        ->with('team')
        ->get();

        return Inertia::render('Players/Favorites', [ 'players' => $players ]);
    }
}
