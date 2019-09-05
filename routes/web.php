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

use App\Http\Controllers\EmployeeController;

Route::get('/admin', function () {
    return view('layouts.master');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('states/get/{id}', 'EmployeeController@getMembership');

// manager routes
Route::group(['as' => 'manager.', 'prefix' => 'manager', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@managerDashboard')->name('dashboard');
    Route::resource('departments', 'DepartmentController');
    Route::resource('employees', 'EmployeeController');
    Route::resource('positions', 'PositionController');
});
// user routes
Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@userDashboard')->name('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
