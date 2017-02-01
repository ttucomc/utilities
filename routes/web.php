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
    return view('layouts.user-master');
});

Route::get('/admin/', function () {
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
    Route::post('api/admin/store', 'AdminController@storeAdmin');
    Route::post('api/team/store/staff', 'AdminController@storeStaff');
    Route::post('api/team/store/faculty', 'AdminController@storeFaculty');
});
