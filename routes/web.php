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

use App\Mail\SendMailNotification;

Route::get('/', function () {
    return view('welcome');
});


Route::get('volunteers/time', 'Volunteer\\VolunteersController@time');
Route::get('volunteers/time/{id}', 'Volunteer\\VolunteersController@time');
Route::get('volunteers/checkVolunteer', 'Volunteer\\VolunteersController@checkVolunteerExist');
Route::get('volunteers/getVolunteer', 'Volunteer\\VolunteersController@getVolunteer');
Route::get('volunteers/getView/{id}', 'Volunteer\\VolunteersController@getView');
Route::post('volunteers/saveTime', 'Volunteer\\VolunteersController@storeVolunteerTime');
Route::resource('volunteers', 'Volunteer\\VolunteersController');

//Route::resource('tests', 'Test\\TestsController');

//Route::get('/test', function () { Airtable::table('test')->get(); });
Route::get('hosts/time', 'Host\\HostsController@time');
Route::get('hosts/time/{email}', 'Host\\HostsController@time');
Route::get('hosts/schools', 'Host\\HostsController@getAllSchool');
Route::get('hosts/test', 'Host\\HostsController@test');
Route::get('hosts/getView/{email}', 'Host\\HostsController@getView');
Route::get('hosts/getViewCount/{email}', 'Host\\HostsController@getViewCount');
Route::get('hosts/register', 'Host\\HostsController@register');
Route::get('hosts/getTeacher', 'Host\\HostsController@getTeacher');
Route::get('hosts/getPeriods', 'Host\\HostsController@getSchoolPeriods');
Route::get('hosts/reasonForm/{params}', 'Host\\HostsController@reasonForm');
Route::post('hosts/saveHost', 'Host\\HostsController@saveHost');
Route::post('hosts/saveClass', 'Host\\HostsController@saveClassDetail');
Route::post('hosts/storeRequestDetail', 'Host\\HostsController@storeRequestDetail');
Route::post('hosts/saveRequestDetail', 'Host\\HostsController@saveRequestDetail');
Route::get('hosts/export', 'Host\\HostsController@export')->name('export');
Route::resource('hosts', 'Host\\HostsController');


Route::get('/send-mail/{type}/{email}/{id}', 'Mail\\MailsController@sendMail');
