<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Team;

class TeamChangeProfileRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'eraiderID', 'first_name', 'last_name', 'email', 'role', 'phone_number', 'photo', 'title', 'department', 'room_number', 'office_hours', 'first_degree', 'second_degree', 'third_degree', 'social_handles', 'bio', 'courses', 'research', 'duties', 'training', 'awards', 'cv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the team member assoicated with the proposal for the profile request.
     *
     * @return App\Team
     */
    public function teamMember()
    {
        return $this->belongsTo('App\Team', 'id');
    }

    /**
     * [createUpdateRequest description]
     * @param Request $request [description]
     */
    public function createUpdateRequest(Request $request)
    {
        $teamMember = Team::where('eraiderID', $request->eraiderID)->first();

        $teamMember->proposedProfileRequest()->save(TeamChangeProfileRequest::create([
            'team_id'        => $teamMember->id,
            'eraiderID'      => $teamMember->eraiderID,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $teamMember->email,
            'phone_number'   => $request->phone_number,
            'role'           => $teamMember->role,
            'title'          => $request->title,
            'department'     => $request->department,
            'room_number'    => $request->room_number,
            'office_hours'   => $request->office_hours,
            'first_degree'   => $request->first_degree,
            'second_degree'  => $request->second_degree,
            'third_degree'   => $request->third_degree,
            'social_handles' => $request->social_handles,
            'bio'            => $request->bio,
            'courses'        => $request->courses,
            'research'       => $request->research,
            'duties'         => $request->duties,
            'training'       => $request->training,
            'awards'         => $request->awards
        ]));

        return $teamMember->proposedProfileRequest;
    }
}
