<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mplayer;

class MPlayerController extends Controller
{
    //
    public function index(){
        $players = MPlayer::all();
        return view('players.index', compact('players'));
    }

    public function create(){
        //Bladeファイルを渡す。
        return view('players.create'); 
    }

    public function store(Request $request){
        $validted = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'uniform_no' => 'required|string|max:10',
            'team' => 'required|string|max:255',
            'highschool' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'birthday' => 'nullable|string|max:255',
            'prefecture' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        //バリテーションを通過したデータをデータベースに保存
        \App\Models\MPlayer::create($validted);

        //players.index(選手一覧画面)にリダイレクトして、フラッシュメッセージを表示
        return redirect()->route('players.index')->with('succes', '登録しました');
    }
}
