<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
}
