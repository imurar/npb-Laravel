<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPlayer;
use App\Models\MTeam;

class TPlayerController extends Controller
{
    //
    public function index($team_id){
        $players = TPlayer::where('team_id', $team_id)->get();
        $team = MTeam::findOrFail($team_id);
        return view('players.index', compact('players', 'team'));
    }

    public function create($team_id){
        $team = MTeam::findOrFail($team_id);
        return view('players.create', compact('team'));
    }

    public function store(Request $request){

    }

    public function show(){

    }

    public function edit(){

    }
}
