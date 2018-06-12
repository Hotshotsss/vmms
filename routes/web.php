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
//Add all the routes for the admin here
Route::prefix('admin')->group(function () {
  Route::get('/',function(){

  });
});
//Add all the routes for the montiring here
Route::prefix('monitoring')->group(function () {
  Route::get('/',function(){

  });
});

//Add all the routes for the gate here
Route::prefix('gate')->group(function () {
  Route::get('/',function(){

  });
});


Route::get('/', function () {
    return view('welcome');
});

Route::post('no','GateController@insertGate');
Route::get('test','GateController@indexGate')->middleware('auth');

Route::get('test2','GateController@Gate2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
