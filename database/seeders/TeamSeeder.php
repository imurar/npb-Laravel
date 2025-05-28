<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('m_teams')->insert([
            ['id' => 1, 'name' => '読売ジャイアンツ'],
            ['id' => 2, 'name' => '阪神タイガース'],
            ['id' => 3, 'name' => '横浜DeNAベイスターズ'],
            ['id' => 4, 'name' => '広島東洋カープ'],
            ['id' => 5, 'name' => '東京ヤクルトスワローズ'],
            ['id' => 6, 'name' => '中日ドラゴンズ'],
            ['id' => 7, 'name' => '福岡ソフトバンクホークス'],
            ['id' => 8, 'name' => '北海道日本ハムファイターズ'],
            ['id' => 9, 'name' => '千葉ロッテマリーンズ'],
            ['id' => 10, 'name' => '東北楽天ゴールデンイーグルス'],
            ['id' => 11, 'name' => 'オリックス・バファローズ'],
            ['id' => 12, 'name' => '埼玉西武ライオンズ'],
        ]);
    }
}
