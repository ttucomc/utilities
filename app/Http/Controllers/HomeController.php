<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application administrator dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'User is now logged in!';
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }
}
