<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // 所属チーム
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // 選手の守備ポジション(多対多)
    public function positions()
    {
        return $this->belongsToMany(Position::class, 'player_position');
    }

    // 打者成績(複数試合分)
    public function batterStatus()
    {
        return $this->hasMany(BatterStat::class);
    }

    // 投手成績(複数試合分)
    public function pitcherStatus()
    {
        return $this->hasMany(PitcherStat::class);
    }
}
