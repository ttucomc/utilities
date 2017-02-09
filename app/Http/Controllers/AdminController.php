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

        $newFacultyMemberID = Team::where('email', $request->email)->first();

        return response()->json([
            'success' => true,
            'id'      => $newFacultyMemberID->id
        ]);
    }

    /**
     * Store the CV for the faculty member.
     *
     * @return [type] [description]
     */
    public function storeFacultyCV(Request $request)
    {
        $facultyMember = Team::find($request->newFacultyMemberID);

        $file = $request->file('file');

        $fileName = $facultyMember->first_name . '-' . $facultyMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move('faculty/cv', $fileName);

        $facultyMember->cv = '/faculty/cv/' . $fileName;
        $facultyMember->save();

        return $facultyMember->cv;
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
