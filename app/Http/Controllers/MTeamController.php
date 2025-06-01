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

    public function show($team_id){
        $team = MTeam::findOrFail($team_id);
        return view('teams.show', compact('team'));
    }

    //public function players($team_id){
    //    $team = MTeam::findOrFail($id);
    //    $players = TPlayer::where('team_id', $team_id)->get();
    //    return view('teams.players', compact('players, team'));
    //}
}
