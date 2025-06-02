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

    public function store(Request $request, $team_id){
        //バリテーション
        $validated  = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|string|max:255',
            'uniform_no' => 'required|string|max:10',
            'highschool' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|max:255',
            'prefecture_id' => 'nullable|string|max:255',
            'city_id' => 'nullable|string|max:255',
        ]);

        //team_idは固定なので後から追加
        $validated['team_id']=$team_id;

        TPlayer::create($validated);

        return redirect()->route('players.index', ['team_id' => $team_id])
                        ->with('success', '選手が登録されました。');
    }

    public function show(){

    }

    public function edit(){

    }
}
