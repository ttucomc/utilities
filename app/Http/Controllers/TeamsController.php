<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use App\Http\Requests;

class TeamsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display information of the Team member.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTeamMemberInfo($elu)
    {
        $teamMember = new Team;
        $teamMember = Team::where('eraiderID', $elu)->first();

        if($teamMember != null) {
            return view('users.home', ['teamMember' => $teamMember]);
        }

        return view('errors.unauthorized-access');
    }
}
