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
     * @param  string $eraiderID [eraiderID of the team member]
     * @return \Illuminate\Http\Response
     */
    public function showTeamMemberInfo($eraiderID)
    {
        $teamMember = new Team;

        if($teamMember != null) {
            return view('users.home', ['teamMember' => $teamMember->getMember($eraiderID)]);
        }

        return view('errors.unauthorized-access');
    }

    /**
     * [storeUserPhoto description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeUserPhoto(Request $request)
    {
        $teamMember = new Team;
        $photopath = $teamMember->storeUserPhotoUploadedByUser($request);

        return response()->json([
            'success'         => true,
            'photopath'       => $photopath
        ]);
    }

    /**
     * [storeFacultyCV description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeFacultyCV(Request $request)
    {
        $facultyMember = new Team;
        $cvpath = $facultyMember->storeFacultyCVUploadedByFacultyMember($request);

        return response()->json([
            'success'   => true,
            'cvpath'        => $cvpath
        ]);
    }
}
