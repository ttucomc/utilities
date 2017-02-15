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
        'eraiderID', 'first_name', 'last_name', 'email', 'photo', 'title', 'department', 'room_number', 'office_hours', 'bachelor', 'master', 'phd', 'social_handles', 'bio', 'courses', 'research', 'duties', 'training', 'awards', 'cv'
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
     * Fetch and return team member.
     *
     * @param  string $eraiderID
     * @return App\Team object
     */
    public function getMember($eraiderID)
    {
        return Team::where('eraiderID', $eraiderID)->first();
    }

    /**
     * Store the new staff member in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeStaff(Request $request)
    {
        $staffMember = Team::create($request->all());
        $staffMember->role = "staff";
        $staffMember->save();

        return $staffMember;
    }

    /**
     * Store the new staff member profile photo in 'public/staff/profile-photos' and make the
     * required database link in the Team table under 'photo' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeStaffProfilePhoto(Request $request)
    {
        $staffMember = Team::find($request->newStaffMemberID);

        $file = $request->file('profile-photo');

        $fileName = $staffMember->first_name . '-' . $staffMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path() . '/staff/profile-photos', $fileName);

        $staffMember->photo = '/staff/profile-photos/' . $fileName;
        $staffMember->save();
    }

    /**
     * Store the new faculty member in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeFaculty(Request $request)
    {
        $facultyMember = Team::create($request->all());
        $facultyMember->role = "faculty";
        $facultyMember->save();

        return $facultyMember;
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

        $file->move(public_path() . '/faculty/cv', $fileName);

        $facultyMember->cv = '/faculty/cv/' . $fileName;
        $facultyMember->save();
    }

    /**
     * Store the new faculty member profile photo in 'public/faculty/profile-photos' and make the
     * required database link in the Team table under 'photo' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeFacultyProfilePhoto(Request $request)
    {
        $facultyMember = Team::find($request->newFacultyMemberID);

        $file = $request->file('profile-photo');

        $fileName = $facultyMember->first_name . '-' . $facultyMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path() . '/faculty/profile-photos', $fileName);

        $facultyMember->photo = '/faculty/profile-photos/' . $fileName;
        $facultyMember->save();
    }

    /**
     * [storeUserPhotoUploadedByUser description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeUserPhotoUploadedByUser(Request $request)
    {
        $teamMember = Team::where('eraiderID', $request->eraiderID)->first();

        $file = $request->file('profile-photo');

        $fileName = $teamMember->first_name . '-' . $teamMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        if($teamMember->role == 'faculty') {
            $file->move(public_path() . '/faculty/profile-photos', $fileName);
            $teamMember->photo = '/faculty/profile-photos/' . $fileName;
        }
        else {
            $file->move(public_path() . '/staff/profile-photos', $fileName);
            $teamMember->photo = '/staff/profile-photos/' . $fileName;
        }

        $teamMember->save();

        return $teamMember->photo;
    }

    /**
     * [storeFacultyCVUploadedByFacultyMember description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeFacultyCVUploadedByFacultyMember(Request $request)
    {
        $facultyMember = Team::where('eraiderID', $request->eraiderID)->first();

        $file = $request->file('cv');

        $fileName = $facultyMember->first_name . '-' . $facultyMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path() . '/faculty/cv', $fileName);
        $facultyMember->cv = '/faculty/cv/' . $fileName;

        $facultyMember->save();

        return $facultyMember->cv;
    }
}
