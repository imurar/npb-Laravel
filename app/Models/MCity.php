<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCity extends Model
{
    protected $table = 'm_cities';
    protected $fillable = ['name', 'prefecture_id'];

    public function players() {
        return $this->hasMany(TPlayer::class, 'city_id');
    }
}
