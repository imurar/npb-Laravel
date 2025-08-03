<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MCityController extends Controller
{
    public function getByPrefecture($prefecture)
    {
        $cities = MCity::where('prefectures_id', $prefecture)->get();
        return response()->json($cities);
    }
}
