<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MPosition;
use App\Models\MTeam;
use App\Models\MPrefecture;
use App\Models\MCity;

class TPlayer extends Model
{
    //
    protected $table = 't_players';

    public function position(){
        return $this->belongsTo(MPosition::class);
    }

    public function team(){
        return $this->belongsTo(MTeam::class);
    }

    public function prefecture(){
        return $this->belongsTo(MPrefecture::class);
    }

    public function city(){
        return $this->belongsTo(MCity::class);
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
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
