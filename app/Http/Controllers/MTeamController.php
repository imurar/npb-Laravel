<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MTeam;

class MTeamController extends Controller
{
    //
    public function index() {
        $teams = MTeam::all();
        return view('teams.index' , compact('teams'));
    }

    public function show($id){
        $teams = MTeam::findOrFail($id);
        return view('teams.show', compact('teams'));
    }

    public function players($id){
        $team = MTeam::findOrFail($id);
        $players = TPlayer::where('team_id', $id)->get();
        return view('teams.players', compact('players'));

    }
}
