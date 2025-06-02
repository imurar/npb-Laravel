<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTeam extends Model
{
    //
    protected $table = 'm_teams'; //つけないとDB誤認するかも。
    
    public $timestamps = false;

    protected $fillable = ['name'];
    
    public function players(){
        return $this->hasMany(TPlayer::class, 'team_id');
    }
}
