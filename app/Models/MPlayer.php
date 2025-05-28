<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPlayer extends Model
{
    //
    public $table = 'm_players';

    protected $fillable = [
        'name',
        'position',
        'unino',
        'team',
        'highscool',
        'university',
        'birthday',
        'prefecture',
        'city',
    ];
}
