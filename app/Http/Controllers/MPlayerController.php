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

    public function createPlayer(){
        //Bladeファイルを渡す。
        return view('players.create'); 
    }

    public function storePlayer(Request $request){

    }
}
