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
    return view('welcome');
});



Auth::routes();

Route::get('/', 'BoardController@dashboard')->name('board');
Route::get('/overview', 'BoardController@tree')->name('tree');

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