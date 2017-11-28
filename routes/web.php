<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

// kijelentkezés
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
});

// Admin
Route::get('/admin/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['App\Http\Middleware\Admin']], function() {
    // Admin dashboard
    Route::get('/admin', 'Admin\IndexController@index');

    // Users
    Route::get('/admin/users', 'Admin\UserController@index');
    Route::get('/admin/user/{index}', 'Admin\UserController@read');
    Route::get('/admin/user/{index}/{searchText}', 'Admin\UserController@read');
    Route::post('/admin/user', 'Admin\UserController@create');
    Route::put('/admin/user', 'Admin\UserController@update');
    Route::delete('/admin/user/{id}', 'Admin\UserController@delete');

    // Jobs
    Route::get('/admin/jobs', 'Admin\JobController@index');
    Route::get('/admin/job/{index}', 'Admin\JobController@read');
    Route::post('/admin/job', 'Admin\JobController@create');
    Route::put('/admin/job', 'Admin\JobController@update');
    Route::delete('/admin/job/{id}', 'Admin\JobController@delete');
});

Auth::routes();
