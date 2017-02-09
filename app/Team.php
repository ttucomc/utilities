<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Image;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'photo', 'title', 'department', 'room_number',
        'office_hours', 'bachelor', 'master', 'phd', 'social_handles', 'bio', 'courses',
        'research', 'duties', 'training', 'awards', 'cv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role'
    ];

    /**
     * Store the new staff member in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeStaff(Request $request)
    {
        $staff = Team::create($request->all());
        $staff->role = "staff";
        $staff->save();
    }

    /**
     * Store the new faculty member in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeFaculty(Request $request)
    {
        $staff = Team::create($request->all());
        $staff->role = "faculty";
        $staff->save();
    }

    /**
     * Store the new faculty member CV in 'public/faculty/cv' and make the required
     * database link in the Team table under 'cv' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeFacultyCV(Request $request)
    {
        $facultyMember = Team::find($request->newFacultyMemberID);

        $file = $request->file('cv');

        $fileName = $facultyMember->first_name . '-' . $facultyMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move('faculty/cv', $fileName);

        $facultyMember->cv = '/faculty/cv/' . $fileName;
        $facultyMember->save();
    }

    /**
     * Store the new staff member CV in 'public/staff/cv' and make the required
     * database link in the Team table under 'cv' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeStaffCV(Request $request)
    {
        $staffMember = Team::find($request->newStaffMemberID);

        $file = $request->file('cv');

        $fileName = $staffMember->first_name . '-' . $staffMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move('staff/cv', $fileName);

        $staffMember->cv = '/staff/cv/' . $fileName;
        $staffMember->save();
    }
}
