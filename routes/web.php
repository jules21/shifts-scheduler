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

Route::get('user', 'ShiftsController@swapShift');

Route::get('/shifts', 'ShiftsController@do')->name('shift');
Route::get('/try', 'ShiftsController@print_timetable')->name('calendart');
Route::get('/timetables', 'ShiftsController@real_timetable')->name('calendary');

Route::get('/calendar', 'ShiftsController@build_calendar')->name('calendar');
Route::get('/go', 'ShiftsController@doCalendars')->name('calendarr');
Route::get('/users', 'ShiftsController@getUser')->name('calesndary');

Route::get('/employee', 'TimeTableController@create')->name('choose.department');
// Route::post('/employee', 'TimeTableController@store')->name('gentimetable');
Route::post('/employee', 'ShiftsController@getUser')->name('gentimetable');

Route::get('/admin', function () {
    return view('layouts.master');
});
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role->name == 'manager') {
            return redirect('/manager/dashboard');
        } else {
            return redirect('/user/dashboard');
        }
    }
    return view('welcome');
});
Route::get('states/get/{id}', 'EmployeeController@getMembership');

Route::get('timetable', 'DashboardController@timetable')->name('timetable');
// manager routes
Route::group(['as' => 'manager.', 'prefix' => 'manager', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@managerDashboard')->name('dashboard');
    Route::get('timetable', 'DashboardController@timetable')->name('timetable');
    Route::get('/timetables', 'ShiftsController@real_timetable')->name('calendary');
    Route::resource('departments', 'DepartmentController');
    Route::resource('employees', 'EmployeeController');
    Route::resource('positions', 'PositionController');
});
// user routes
Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@userDashboard')->name('dashboard');
    Route::resource('leaves', 'LeaveController');
    Route::resource('switch-shifts', 'SwitchSHiftController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
