<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MTeam;
use Inertia\Inertia;

class MTeamController extends Controller
{
    public function index() {
        $teams = MTeam::all();
        return Inertia::render('Teams/Index',['teams' => $teams,]);
    }

    public function show($team_id){
        $team = MTeam::findOrFail($team_id);
        return Inertia::render('Teams/Show',['team' => $team,]);
    }
}
