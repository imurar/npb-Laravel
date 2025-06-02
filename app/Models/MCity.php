<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCity extends Model
{
    //
    protected $table = 'm_citys';

    public $timestamps = false;

    protected $fillable = ['name'];

    public function players(){
        return $this->hasMany(TPlayer::class, 'city_id');
    }
}
