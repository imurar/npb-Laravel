<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPlayer;
use App\Models\MTeam;
use App\Models\MPosition;
use App\Models\MPrefecture;
use App\Models\MCity;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'uniform_no' => [
                'required',
                'max:10',
                Rule::unique('t_players')->where(function($query) use($request, $team_id) {
                    return $query->where('name', $request->name)
                                ->where('team_id', $team_id);
                }),
            ],
            'highschool' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'birthday' => 'required|date',
            'prefecture_id' => 'nullable|integer|max:47',
            'city_id' => 'nullable|integer|max:1892',
        ], [
        'uniform_no.unique' => 'この選手名と背番号の組み合わせはすでに登録されています。',
        ]);

        //team_idは固定なので後から追加
        $validated['team_id'] = $team_id;
        $validated['birthday'] = \Carbon\Carbon::parse($validated['birthday'])->format('Y-m-d');

        TPlayer::create($validated);

        return redirect()->route('players.index', ['team_id' => $team_id])
            ->with('success', '選手が登録されました。');
    }

    public function show($team_id, $player_id){
        $player = TPlayer::with(['position', 'team', 'prefecture', 'city'])
            ->where('team_id', $team_id)
            ->withCount(['favoredByUsers as is_favorite' => function($query) {
            $query->where('user_id', Auth::id());
        }])
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
            'uniform_no' => [
                'required',
                'max:10',
                Rule::unique('t_players')->where(function ($query) use($request, $team_id) {
                    return $query->where('name', $request->name)
                                ->where('team_id', $team_id);
                })->ignore($player_id),
            ],
            'highschool' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'prefecture_id' => 'nullable|integer|max:47',
            'city_id' => 'nullable|integer|max:1892',
        ], [
                'uniform_no.unique' => 'この選手名と背番号の組み合わせはすでに登録されています。',
            ]);

        $request['birthday'] = \Carbon\Carbon::parse($request['birthday'])->format('Y-m-d');

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

    public function toggleFavorite($team_id, $player_id){
        $user = Auth::user();

        $player = TPlayer::where('team_id', $team_id)->findOrFail($player_id);

        //すでにお気に入りに登録されているかチェック
        $exists = $user->favoritePlayers()->where('player_id', $player_id)->exists();

        if($exists){
            $user->favoritePlayers()->detach($player_id);
            $favorited = false;
        } else {
            $user->favoritePlayers()->attach($player_id);
            $favorited = true;
        }

        return response()->json(['is_favorite' => $favorited]);
    }

}
