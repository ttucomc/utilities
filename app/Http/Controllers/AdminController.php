<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\User;
use App\Team;
use App\TeamChangeProfileRequest;
use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    /**
     * Display admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = new User;

        return view('layouts.admin-master',
            ['numChangeBioRequests' => $admin->getNumChangeBioRequests()]);
    }

    /**
     * Show the form for creating a new Administrator.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Handled by Vuejs router
    }

    /**
     * Store a newly created Administrator in storage.
     *
     * @param  \Illuminate\Http\StoreNewAdministratorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(Requests\StoreNewAdministratorRequest $request)
    {
        $admin = new User;
        $admin->storeAdmin($request);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Store a newly created staff member in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreNewStaffRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeStaff(Requests\StoreNewStaffRequest $request)
    {
        $staffMember = new Team;
        $staffMember = $staffMember->storeStaff($request);

        return response()->json([
            'success' => true,
            'id'      => $staffMember->id
        ]);
    }

    /**
     * Store the photo for the new staff member.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeStaffProfilePhoto(Request $request)
    {
        $staffMember = new Team;
        $staffMember->storeStaffProfilePhotoUploadedByAdmin($request);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Store a newly created faculty member in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreNewFacultyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeFaculty(Requests\StoreNewFacultyRequest $request)
    {
        $facultyMember = new Team;
        $facultyMember = $facultyMember->storeFaculty($request);

        return response()->json([
            'success' => true,
            'id'      => $facultyMember->id
        ]);
    }

    /**
     * Store the CV for the new faculty member.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeFacultyCV(Request $request)
    {
        $facultyMember = new Team;
        $facultyMember->storeFacultyCVUploadedByAdmin($request);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Store the profile photo for the new faculty member.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeFacultyProfilePhoto(Request $request)
    {
        $facultyMember = new Team;
        $facultyMember->storeFacultyProfilePhotoUploadedByAdmin($request);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display pending bio requests to the administrator.
     * @return [type] [description]
     */
    public function showBioRequests()
    {
        $bioRequests = new TeamChangeProfileRequest;

        return response()->json([
            'changeBioRequests' => $bioRequests->fetchBioRequests()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateBio(Requests\UpdateTeamMemberBio $request)
    {
        $teamMember = new Team;
        $teamMember->updateTeamMemberBio($request);

        return response()->json([
            'success'   => true,
            'name'      => $request->first_name . ' ' . $request->last_name,
            'eraiderID' => $request->eraiderID
        ]);
    }

    /**
     * Fetch and return all team members from database.
     * @return App\Team collection
     */
    public function getAllTeamMembers()
    {
        $teamMembers = new Team;

        return $teamMembers->getAllMembers();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
