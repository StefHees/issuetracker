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

Route::get('/board', 'BoardController@overview')->name('board');

Route::resources([
    'clients' => 'ClientController',
    'tasks' => 'TaskController',
]);

Route::resources([
    'issues' => 'IssueController',
]);

Route::resources([
    'statuses' => 'StatusController',
]);

Route::resources([
    'time_registrations' => 'TimeRegistrationController',
]);

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/show/{id}', 'UserController@show')->middleware('role:admin')->name('users.show');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/users/update', 'UserController@update')->name('users.update');
Route::post('/users/destroy', 'UserController@destroy')->name('users.destroy');

Route::get('/changes/password', 'ChangesController@change_password')->name('changes.password');
Route::post('/changes/password', 'ChangesController@update_password')->name('changes.update_password');