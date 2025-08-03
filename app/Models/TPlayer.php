<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class TPlayer extends Model
{

    public $timestamps = false;
    
    public function position(){
        return $this->belongsTo(MPosition::class, 'position_id');
    }

    public function team(){
        return $this->belongsTo(MTeam::class, 'team_id');
    }

    public function prefecture(){
        return $this->belongsTo(MPrefecture::class, 'prefecture_id');
    }

    public function city(){
        return $this->belongsTo(MCity::class, 'city_id');
    }

    protected $fillable = [
        'name',
        'position_id',
        'uniform_no',
        'team_id',
        'highschool',
        'university',
        'company',
        'birthday',
        'prefecture_id',
        'city_id',
        'is_favorite',
    ];
    

    protected $casts = [
        'is_favorite' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    public function favoredByUsers (){
        return $this->belongsToMany(User::class, 't_favorite_players', 'player_id', 'user_id')->withTimestamps();
    }

}
