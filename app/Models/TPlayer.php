<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPlayer extends Model
{
    //
    public $table = 't_players';

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
    ];
}
