<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Team;
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
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $staff = new Team;
        $staff->storeStaff($request);

        $newStaffMember = Team::where('email', $request->email)->first();

        return response()->json([
            'success' => true,
            'id'      => $newStaffMember->id
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
        // call model function to store staff photo
        $staffMember->storeStaffProfilePhoto($request);

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
        $staff = new Team;
        $staff->storeFaculty($request);

        $newFacultyMember = Team::where('email', $request->email)->first();

        return response()->json([
            'success' => true,
            'id'      => $newFacultyMember->id
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
        // call model function to store faculty CV
        $facultyMember->storeFacultyCV($request);

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
        // call model function to store faculty CV
        $facultyMember->storeFacultyProfilePhoto($request);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
