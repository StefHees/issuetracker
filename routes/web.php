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



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


Route::get('/dashboard', 'BoardController@dashboard')->name('dashboard');

Route::resources([
    'clients' => 'ClientController',
    'tasks' => 'TaskController',
    'types' => 'TypeController',
]);

Route::resources([
    'statuses' => 'StatusController',
]);

Route::resources([
    'time_registrations' => 'TimeRegistrationController',
]);

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/show/{id}', 'UserController@show')->middleware('role:admin', 'role:agent')->name('users.show');
Route::get('/users/create', 'UserController@create')->middleware('role:admin')->name('users.create');
Route::post('/users/store', 'UserController@store')->middleware('role:admin')->name('users.store');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/users/update', 'UserController@update')->name('users.update');
Route::post('/users/destroy', 'UserController@destroy')->middleware('role:admin')->name('users.destroy');

Route::get('/change/password', 'ChangeController@change_password')->name('change.password');
Route::post('/change/password', 'ChangeController@update_password')->name('change.update_password');