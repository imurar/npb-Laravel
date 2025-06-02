<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPlayer;
use App\Models\MTeam;
use App\Models\MPosition;
use App\Models\MPrefecture;
use App\Models\MCity;

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
        $positions = MPosition::all();
        $prefectures = MPrefecture::all();
        $citys = MCity::all();
        return view('players.create', compact('team', 'positions', 'prefectures', 'citys'));
    }

    public function store(Request $request){

    }

    public function show(){

    }

    public function edit(){

    }
}
