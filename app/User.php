<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as UserAuthenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable implements UserAuthenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin',
    ];

    /**
     * Determine if the user is an administrator.
     *
     * @return boolean
     */
    public function isAdmin() {
        return $this->is_admin;
    }

    /**
     * Store the new Administrator in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeAdmin(Request $request)
    {
        $admin = User::create($request->all());
        $admin->is_admin = 1;
        $admin->save();
    }
}
