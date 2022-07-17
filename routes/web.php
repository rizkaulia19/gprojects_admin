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

Route::get('/', 'DashboardController@index')->name('dashboard')->middleware(['authRoute']);
Route::get('/dss', 'CriteriaController@index')->name('dss')->middleware(['authRoute']);
Route::resource('projects', 'ProjectController')->parameters([
    'projects' => 'id'
])->middleware(['authRoute']);
Route::resource('project-activities', 'ProjectActivityController')->parameters([
    'project-activities' => 'id'
])->middleware(['authRoute']);
Route::resource('users', 'UserController')->parameters([
    'users' => 'id'
])->middleware(['authRoute']);
Route::resource('specializations', 'SpecializationController')->parameters([
    'specializations' => 'id'
])->middleware(['authRoute']);
Route::resource('roles', 'RoleController')->parameters([
    'roles' => 'id'
])->middleware(['authRoute']);
Route::resource('banks', 'BankController')->parameters([
    'banks' => 'id'
])->middleware(['authRoute']);
Route::resource('advertise-types', 'AdvertiseTypeController')->parameters([
    'advertise-types' => 'id'
])->middleware(['authRoute']);
Route::resource('advertises', 'AdvertiseController')->parameters([
    'advertises' => 'id'
])->middleware(['authRoute']);
Route::resource('payment-gateways', 'PaymentGatewayController')->parameters([
    'payment-gateways' => 'id'
])->middleware(['authRoute']);
Route::resource('payment-types', 'PaymentTypeController')->parameters([
    'payment-types' => 'id'
])->middleware(['authRoute']);
Route::get('login', 'Auth\LoginController@getLoginPage')->name('loginPage');
Route::get('register', 'Auth\RegisterController@getRegisterPage')->name('registerPage');
Route::post('post', 'Auth\LoginController@login')->name('login');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
