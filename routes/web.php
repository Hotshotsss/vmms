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

  Route::middleware(['guest','revalidate'])->group(function(){
    Route::get('/',function(){
      return view('auth.login');
    })->name('admin-login');

  });

  Route::middleware(['admin'])->group(function () {
    // Route::get('home',function(){
    //   return 'admin home';
    // });
    Route::get('home','AdminController@home');
    Route::get('settings','AdminController@settings');

    //Parking Locations
    Route::get('parking','AdminController@parking');
    Route::post('add-location','AdminController@addParking');
    // Route::get('RateSettings','GateController@RateSets');
    Route::get('reports','AdminController@reports');
    //FlatRate
    Route::get('flat-rate','AdminController@flatRate');
    Route::post('add-rate','AdminController@addRate');
    Route::post('edit-rate','AdminController@editRate');
    //Discount
    Route::get('discount','AdminController@discount');
    //Car Settings
    Route::get('view-car','AdminController@viewCar');
    Route::post('add-car','AdminController@addCar');
    Route::post('delete-car','AdminController@deleteCar');
    //logout
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  });
});
//Add all the routes for the montiring here
Route::prefix('monitoring')->group(function () {
  Route::middleware(['guest','revalidate'])->group(function(){
    Route::get('/',function(){
      return view('auth.login');
    });
  });
  Route::middleware(['monitor'])->group(function () {
    Route::get('home',function(){
      return 'monitoring home';
    });
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  });
});

//Add all the routes for the gate here
Route::prefix('gate')->group(function () {
  Route::middleware(['guest','revalidate'])->group(function(){
    Route::get('/',function(){
      return view('auth.login');
    });
  });
  Route::middleware(['gate'])->group(function () {
    Route::get('home',function(){
      return 'gate home';
    });


    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  });
});


Route::get('/', function () {
  return view('welcome');
});

Route::post('no','GateController@insertGate');
Route::get('test','GateController@indexGate')->middleware('auth');


//login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('PDFtry', 'GateController@generate_pdf');

Route::get('Menu', 'GateController@MenuList');
Route::get('VehicleIn', 'GateController@Vehicle_In');
Route::post('VehicleInAdd', 'GateController@Vehicle_InAdd');
Route::get('VehicleOut', 'GateController@Vehicle_Out');
Route::get('VehicleMonitoring', 'GateController@Vehicle_Monitoring');

Route::get('/home2', 'HomeController@index')->name('home');

Route::get('calendar', function () {
  return view('calendar');
});