<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;
use App\TeamChangeProfileRequest;
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
     * Display bio of the Team member.
     *
     * @param  string $eraiderID [eraiderID of the team member]
     * @return \Illuminate\Http\Response
     */
    public function showTeamMemberInfo($eraiderID)
    {
        $teamMember = new Team;

        $member = $teamMember->getMember($eraiderID);
        $pendingRequest = $member->proposedProfileRequest;

        if($pendingRequest) {
            return view('users.pending-request', ['pendingRequest' => $pendingRequest,
                                                    'teamMember'   => $member]);
        }

        if($member != null) {
            return view('users.home', ['teamMember' => $member]);
        }

        return view('errors.unauthorized-access');
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
            'cvpath'    => $cvpath
        ]);
    }

    /**
     * [requestToUpdateBio description]
     * @param  RequestsUpdateTeamMemberBio $request [description]
     * @return [type]                               [description]
     */
    public function requestToUpdateBio(Requests\UpdateTeamMemberBio $request)
    {
        $updateRequest = new TeamChangeProfileRequest;

        // if(strcmp($updateRequest->hasPendingRequest($request), 'true') === 0)
        // {
        //     return redirect('/user-portal/' . $request->eraiderID)
        //         ->with('pending-request', 'It looks like you have a pending request to change your bio that has not been approved by an administrator. You will not be able to make changes until your previous request has been approved.');
        // }

        return redirect('/user-portal/' . $updateRequest->createUpdateRequest($request)->eraiderID)
                ->with('status', 'Your request has been sent to an administrator for approval.');
    }
}
