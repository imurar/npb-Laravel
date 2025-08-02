<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MPrefecture extends Model
{
    protected $fillable = ['name'];

    public function players() {
        return $this->hasMany(TPlayer::class, 'prefecture_id');
    }
}
