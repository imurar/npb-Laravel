<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPlayer;
use App\Models\MTeam;
use App\Models\MPosition;
use App\Models\MPrefecture;
use App\Models\MCity;
use Inertia\Inertia;

class TPlayerController extends Controller
{
    //
    public function index($team_id){
        $players = TPlayer::with('position')->where('team_id', $team_id)->get();
        $team = MTeam::findOrFail($team_id);
        //return view('players.index', compact('players', 'team'));
        return Inertia::render('Players/Index', ['players' => $players, 'team' => $team]);
    }

    public function create($team_id){
        $team = MTeam::findOrFail($team_id);
        $positions = MPosition::all();
        $prefectures = MPrefecture::all();
        $citys = MCity::all();
        //return view('players.create', compact('team', 'positions', 'prefectures', 'citys'));
        return Inertia::render('Players/Create', ['team' => $team, 'positions' => $positions, 'prefectures' => $prefectures, 'citys' => $citys]);
    }

    public function store(Request $request, $team_id){
        //バリテーション
        $validated  = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|integer|max:9',
            'uniform_no' => 'required|string|max:10',
            'highschool' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|max:255',
            'prefecture_id' => 'nullable|integer|max:47',
            'city_id' => 'nullable|integer|max:1892',
        ]);

        //team_idは固定なので後から追加
        $validated['team_id'] = $team_id;

        TPlayer::create($validated);

        return redirect()->route('players.index', ['team_id' => $team_id])
            ->with('success', '選手が登録されました。');
    }

    public function show($team_id, $player_id){
        $player = TPlayer::with(['position', 'team', 'prefecture', 'city'])
            ->where('team_id', $team_id)
            ->findOrFail($player_id);
        
        $team = MTeam::findOrFail($team_id);

        //return view('players.show', compact('team', 'player'));
        return Inertia::render('Players/Show', ['team' => $team, 'player' => $player]);
    }   

    public function edit($team_id, $player_id){
        $player = TPlayer::with(['position', 'team', 'prefecture', 'city'])
            ->where('team_id', $team_id)
            ->findOrFail($player_id);
        
        $team = MTeam::findOrFail($team_id);

        $positions = MPosition::all();
        $prefectures =Mprefecture::all();
        $citys = MCity::all();

        //return view('players.edit', compact('player', 'team', 'positions', 'prefectures', 'citys'));
        return Inertia::render('Players/Edit', ['player' => $player, 'team' => $team, 'positions' => $positions, 'prefectures' => $prefectures, 'citys' => $citys]);
    }

    public function update(Request $request, $team_id, $player_id){

        $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|integer|max:9',
            'uniform_no' => 'required|string|max:10',
            'highschool' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|max:255',
            'prefecture_id' => 'nullable|integer|max:47',
            'city_id' => 'nullable|integer|max:1892',
        ]);

        $player = TPlayer::where('team_id', $team_id)->findOrFail($player_id);

        $player->update($request->all());

        return redirect()->route('players.show', ['team_id' => $team_id, 'player_id' => $player_id])
            ->with('success', '選手情報を更新しました。');
    }

    public function destroy($team_id, $player_id){
        $player = TPlayer::where('team_id', $team_id)->findOrFail($player_id);
        $player->delete();

        return redirect()->route('players.index', ['team_id' => $team_id])
            ->with('success', '選手情報が削除されました。');
    }

    public function restore($team_id, $player_id){
        $player = TPlayer::onlyTrashed()
            ->where('team_id', $team_id)
            ->where('id', $player_id)
            ->firstOrFail();
            
        $player->restore();

        return redirect()->route('players.deleted', ['team_id' => $team_id])
            ->with('success', '選手情報を復元しました。');
    }

    public function deleted($team_id){
        $players = TPlayer::onlyTrashed()->where('team_id', $team_id)->get();
        //return view('players.deleted', compact('players', 'team_id'));
        return Inertia::render('Players/Deleted', ['players' => $players, 'team_id' => $team_id]);
    }

}
