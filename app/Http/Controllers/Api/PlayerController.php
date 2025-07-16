<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // 選手一覧
    public function index() 
    {
        $players = Player::with(['team', 'positions'])->get();

        return response()->json($players);
    }

    // 選手詳細
    public function show($id)
    {
        $player = Player::with([
            'team',
            'positions',
            'baterStatus' => fn($q) => $q->orderByDesc('match_date')->limit(3),
            'pitcherStatus' => fn($q) => $q->orderByDesc('match_date')->limit(3),
        ])->findOrFail($id);

        return response()->json($player);
    }
}
