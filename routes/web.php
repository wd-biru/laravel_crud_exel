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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'UserController@index');
Route::post('/userdata', 'UserController@userdata');

Route::get('/editdata/{id}', 'UserController@editdata');
Route::get('/delete/{id}', 'UserController@deletedata');

Route::post('/updatedata', 'UserController@updatedata');

Route::get('/exports', 'UserController@exportData');

Route::get('/student', 'StudentController@index');
Route::post('/studentadd', 'StudentController@store');

Route::get('dropdownlist','DropdownController@index');
Route::get('get-state-list','DropdownController@getStateList');
Route::get('get-city-list','DropdownController@getCityList');


Route::post('/dropdown_value','DropdownController@dropdown_value');


