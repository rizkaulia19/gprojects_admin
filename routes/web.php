<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/dss', 'CriteriaController@index')->name('dss');
Route::resource('projects', 'ProjectController')->parameters([
    'projects' => 'id'
]);
Route::resource('project-activities', 'ProjectActivityController')->parameters([
    'project-activities' => 'id'
]);
Route::resource('users', 'UserController')->parameters([
    'users' => 'id'
]);
Route::resource('specializations', 'SpecializationController')->parameters([
    'specializations' => 'id'
]);
Route::resource('roles', 'RoleController')->parameters([
    'roles' => 'id'
]);
Route::resource('banks', 'BankController')->parameters([
    'banks' => 'id'
]);
Route::resource('advertise-types', 'AdvertiseTypeController')->parameters([
    'advertise-types' => 'id'
]);
Route::resource('advertises', 'AdvertiseController')->parameters([
    'advertises' => 'id'
]);
Route::resource('payment-gateways', 'PaymentGatewayController')->parameters([
    'payment-gateways' => 'id'
]);
Route::resource('payment-types', 'PaymentTypeController')->parameters([
    'payment-types' => 'id'
]);

Auth::routes();
