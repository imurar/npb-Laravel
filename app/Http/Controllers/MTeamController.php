<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MTeam;
use Inertia\Inertia; //vue導入で必要

class MTeamController extends Controller
{
    //
    public function index() {
        $teams = MTeam::all();
        //return view('teams.index' , compact('teams'));
        return Inertia::render('Teams/Index',['teams' => $teams,]);
    }

    public function show($team_id){
        $team = MTeam::findOrFail($team_id);
        //return view('teams.show', compact('team'));
        return Inertia::render('Teams/Show',['team' => $team,]);
    }

    //public function players($team_id){
    //    $team = MTeam::findOrFail($id);
    //    $players = TPlayer::where('team_id', $team_id)->get();
    //    return view('teams.players', compact('players, team'));
    //}
}
