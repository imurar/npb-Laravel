<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCity extends Model
{
    protected $fillable = ['name', 'prefectures_id'];

    public function players() {
        return $this->hasMany(TPlayer::class, 'city_id');
    }
}
