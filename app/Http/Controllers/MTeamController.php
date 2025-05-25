<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MTeam;

class MTeamController extends Controller
{
    //
    public function createTeams()
    {
        $teams = [
        ['name' => '読売ジャイアンツ'],
        ['name' => '阪神タイガース'],
        ['name' => '横浜DeNAベイスターズ'],
        ['name' => '広島東洋カープ'],
        ['name' => '東京ヤクルトスワローズ'],
        ['name' => '中日ドラゴンズ'],
        ['name' => '福岡ソフトバンクホークス'],
        ['name' => '北海道日本ハムファイターズ'],
        ['name' => '千葉ロッテマリーンズ'],
        ['name' => '東北楽天ゴールデンイーグルス'],
        ['name' => 'オリックス・バファローズ'],
        ['name' => '埼玉西武ライオンズ'],
        ];

        foreach($teams as $team){
            MTeam::create($team);
        }

        return '登録完了';
    }

    public function listTeams()
    {
        $teams = MTeam::all();

        return view('teams.index', ['teams' => $teams]);
    }
}
