<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MTeam;

class MTeamController extends Controller
{
    //
    public function index() {
        $teams = MTeam::all();
        return view('teams.index' , compact('teams'));
    }
}
