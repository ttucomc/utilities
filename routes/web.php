<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('layouts.welcome-page');
});

Route::get('/eraider-sign-in', function() {
    return view('layouts.eRaider.eraider-authentication');
});

Route::get('user-portal/{eraiderID}', 'TeamsController@showTeamMemberInfo');
Route::post('user-portal/api/team/store/faculty-team-member/cv', 'TeamsController@storeFacultyCV');
Route::post('user-portal/api/team/update-bio-request', 'TeamsController@requestToUpdateBio');


Route::get('admin-portal', function () {
    return view('layouts.admin-master');
});

Route::get('admin-portal/create-staff-member', function() {
    return view('layouts.admin-master');
});

Route::get('admin-portal/create-news-article', function() {
    return view('layouts.admin-master');
});

Route::get('admin-portal/create-faculty-member', function() {
    return view('layouts.admin-master');
});

Route::get('unauthorized-access', function() {
    return view('errors.unauthorized-access');
});

Route::get('auth/logout', function() {
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});

Route::group(['middleware' => 'admin'], function() {
    Route::post('admin-portal/api/admin/store', 'AdminController@storeAdmin');

    Route::post('admin-portal/api/team/store/staff', 'AdminController@storeStaff');
    Route::post('admin-portal/api/team/store/staff/profile-photo', 'AdminController@storeStaffProfilePhoto');

    Route::post('admin-portal/api/team/store/faculty', 'AdminController@storeFaculty');
    Route::post('admin-portal/api/team/store/faculty/cv', 'AdminController@storeFacultyCV');
    Route::post('admin-portal/api/team/store/faculty/profile-photo', 'AdminController@storeFacultyProfilePhoto');
});
