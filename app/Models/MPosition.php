<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPosition extends Model
{
    //
    public $table = 'm_positions';
    
    public $timestamps = false;

    protected $fillable = ['name'];

    //TPlayerとのリレーション
    public function players() {
        return $tihs->hasMany(TPlayer::class, 'position_id');
    }
}
