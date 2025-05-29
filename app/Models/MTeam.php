<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTeam extends Model
{
    //
    public $table = 'm_teams'; //つけないとDB誤認するかも。
    
    protected $fillable = ['name'];
}
