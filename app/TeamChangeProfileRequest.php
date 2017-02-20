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
        'team_id', 'first_name', 'last_name', 'phone_number', 'photo', 'title', 'department', 'room_number', 'office_hours', 'first_degree', 'second_degree', 'third_degree', 'social_handles', 'bio', 'courses', 'research', 'duties', 'training', 'awards', 'cv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'eraiderID', 'role'
    ];

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
        $teamMember = Team::where('eraiderID', $request->eraiderID);
        $teamMember->proposedProfileRequest()->save($request->all());
        return $updateRequest;
    }
}
