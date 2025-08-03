<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MCity;

class MCityController extends Controller
{
    public function getByPrefecture($prefecture)
    {
        $cities = MCity::where('prefecture_id', $prefecture)->get();
        return response()->json($cities);
    }
}
