<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPosition extends Model
{
    protected $fillable = ['name'];

    //TPlayerとのリレーション
    //Position 1 に属するプレイヤーが複数いる場合、このリレーションで
    //position->players で全プレイヤーが取得できる。
    public function players() {
        return $this->hasMany(TPlayer::class, 'position_id');
    }
}
