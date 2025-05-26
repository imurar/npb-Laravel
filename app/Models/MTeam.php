<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTeam extends Model
{
    //
    protected $table = 'm_teams'; //つけないとm_teamsesでご認識するかも
    protected $fillable = ['name'];
}
