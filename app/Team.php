<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

// use Image;

class Team extends Model
{
    protected $awsPhotosURL = 'https://s3.us-east-2.amazonaws.com/comc-team/photos/';
    protected $awsCVsUrl = 'https://s3.us-east-2.amazonaws.com/comc-team/cvs/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'eraiderID', 'first_name', 'last_name', 'email', 'phone_number', 'photo', 'title', 'department', 'room_number', 'office_hours', 'first_degree', 'second_degree', 'third_degree', 'social_handles', 'bio', 'courses', 'research', 'duties', 'training', 'awards', 'cv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'position'
    ];

    /**
     * Get the proposed profile request with the team member.
     *
     * @return App\TeamChangeProfileRequest
     */
    public function proposedProfileRequest()
    {
        return $this->hasOne('App\TeamChangeProfileRequest', 'team_id');
    }

    /**
     * Fetch and return team member.
     *
     * @param  string $eraiderID
     * @return App\Team object
     */
    public function getMember($eraiderID)
    {
        $teamMember = Team::where('eraiderID', $eraiderID)->first();
        if($teamMember) {
            return $teamMember;
        }

        return null;
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
        $staffMember->position = "staff";
        $staffMember->save();

        return $staffMember;
    }

    /**
     * Store the new staff member profile photo in 'public/staff/profile-photos' and make the
     * required database link in the Teams table under 'photo' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeStaffProfilePhotoUploadedByAdmin(Request $request)
    {
        $staffMember = Team::find($request->newStaffMemberID);

        $file = $request->file('profile-photo');

        $fileName = $staffMember->first_name . '-' . $staffMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/photos/' . $fileName;
        $s3->put($filePath, file_get_contents($file), 'public');

        $staffMember->photo = $this->awsPhotosURL . $fileName;
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
        $facultyMember->position = "faculty";
        $facultyMember->save();

        return $facultyMember;
    }

    /**
     * Store the new faculty member CV in 'public/faculty/cv' and make the required
     * database link in the Teams table under 'cv' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeFacultyCVUploadedByAdmin(Request $request)
    {
        $facultyMember = Team::find($request->newFacultyMemberID);

        $file = $request->file('cv');

        $fileName = $facultyMember->first_name . '-' . $facultyMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/cvs/' . $fileName;
        $s3->put($filePath, file_get_contents($file), 'public');

        $facultyMember->cv = $this->awsCVsUrl . $fileName;
        $facultyMember->save();
    }

    /**
     * Store the new faculty member profile photo in 'public/faculty/profile-photos' and make the
     * required database link in the Team table under 'photo' column.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeFacultyProfilePhotoUploadedByAdmin(Request $request)
    {
        $facultyMember = Team::find($request->newFacultyMemberID);

        $file = $request->file('profile-photo');

        $fileName = $facultyMember->first_name . '-' . $facultyMember->last_name . '-' . time() . '.' . $file->getClientOriginalExtension();

        $s3 = \Storage::disk('s3');
        $filePath = '/photos/' . $fileName;
        $s3->put($filePath, file_get_contents($file), 'public');

        $facultyMember->photo = $this->awsPhotosURL . $fileName;
        $facultyMember->save();
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

        $s3 = \Storage::disk('s3');
        $filePath = '/cvs/' . $fileName;
        $s3->put($filePath, file_get_contents($file), 'public');

        $facultyMember->cv = $this->awsCVsUrl . $fileName;

        $facultyMember->save();

        return $facultyMember->cv;
    }

    /**
     * [updateTeamMemberBio description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateTeamMemberBio(Request $request) {
        $changeBioRequestInfo = TeamChangeProfileRequest::where('eraiderID', $request->eraiderID)->first();

        $teamMember = Team::where('eraiderID', $request->eraiderID)->first();
        $teamMember->update([
                'first_name'        => $changeBioRequestInfo->first_name,
                'last_name'         => $changeBioRequestInfo->last_name,
                'phone_number'      => $changeBioRequestInfo->phone_number,
                'title'             => $changeBioRequestInfo->title,
                'department'        => $changeBioRequestInfo->department,
                'room_number'       => $changeBioRequestInfo->room_number,
                'office_hours'      => $changeBioRequestInfo->office_hours,
                'first_degree'      => $changeBioRequestInfo->first_degree,
                'second_degree'     => $changeBioRequestInfo->second_degree,
                'third_degree'      => $changeBioRequestInfo->third_degree,
                'social_handles'    => $changeBioRequestInfo->social_handles,
                'bio'               => $changeBioRequestInfo->bio,
                'courses'           => $changeBioRequestInfo->courses,
                'research'          => $changeBioRequestInfo->research,
                'duties'            => $changeBioRequestInfo->duties,
                'training'          => $changeBioRequestInfo->training,
                'awards'            => $changeBioRequestInfo->awards
            ]);
        $teamMember->save();

        $teamMember->proposedProfileRequest->delete();
    }
}
