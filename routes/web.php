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

Route::get('map','AdminController@showMap');
//Add all the routes for the admin here
Route::prefix('admin')->group(function () {

  Route::middleware(['guest','revalidate'])->group(function(){
    Route::get('/',function(){
      return view('auth.login');
    })->name('admin-login');
  });

  Route::middleware(['admin','revalidate'])->group(function () {

    Route::post('register', 'Auth\RegisterController@register');
    Route::post('edit-user', 'AdminController@editUser');
    // Route::post('edit-password', 'Auth\RegisterController@register');
    Route::post('edit-password', 'AdminController@editPassword');
    Route::post('delete-user', 'AdminController@deleteUser');
    //
    Route::get('home','AdminController@home');
    Route::get('settings','AdminController@settings');
    Route::get('getSched','AdminController@getSched');

    //Parking Locations
    Route::get('parking','AdminController@parking');
    Route::post('add-location','AdminController@addParking');
    Route::post('edit-parking','AdminController@editParking');
    Route::post('delete-parking','AdminController@deleteParking');
    //Parking Purpose
    Route::get('purpose','AdminController@purpose');
    Route::post('add-purpose','AdminController@addPurpose');
    Route::post('edit-purpose','AdminController@editPuropose');
    Route::post('delete-purpose','AdminController@deletePurpose');
    // Route::get('RateSettings','GateController@RateSets');
    Route::get('reports','AdminController@reports');
    Route::get('reports/daily','AdminController@daily');
    Route::get('reports/weekly','AdminController@weekly');
    Route::get('reports/monthly','AdminController@monthly');
    Route::get('reports/yearly','AdminController@yearly');
    Route::get('reportPDF/{param}','AdminController@reportPDF');
    //FlatRate
    Route::get('flat-rate','AdminController@flatRate');
    Route::post('add-rate','AdminController@addRate');
    Route::post('edit-rate','AdminController@editRate');
    //Discount
    Route::get('discount','AdminController@discount');

    //Car Settings
    Route::get('view-car','AdminController@viewCar');
    Route::get('view-model','AdminController@ViewModel');
    Route::post('add-car','AdminController@addCar');
    Route::post('delete-car','AdminController@deleteCar');
    Route::post('add-model','AdminController@addModel');
    Route::post('delete-model','AdminController@deleteModel');
    Route::get('view-violation','AdminController@viewViolations');
    Route::post('add-violation','AdminController@adminAddViolation');
    Route::post('edit-violation','AdminController@adminEditViolation');
    Route::post('delete-violation','AdminController@adminDeleteViolation');
    //Employee schedule
    Route::get('employee-schedule','AdminController@viewSchedule');
    Route::post('add-sched','AdminController@addSchedule');
    Route::post('edit-sched','AdminController@editSchedule');
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
  Route::middleware(['monitor','revalidate'])->group(function () {

    Route::get('home', 'MonitoringController@Home');
    Route::post('edit-password', 'AdminController@editPassword');
    Route::post('add-location', 'MonitoringController@addLocation');
    Route::post('edit-location', 'MonitoringController@editLocation');
    Route::post('add-violation', 'MonitoringController@addViolation');
    Route::post('add-color', 'MonitoringController@addColor');
    Route::post('edit-color', 'MonitoringController@editColor');
    Route::post('add-remarks', 'MonitoringController@addRemarks');
    Route::post('edit-remarks', 'MonitoringController@editRemarks');

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
  Route::middleware(['gate','revalidate'])->group(function () {

    Route::get('home', 'GateController@menu');
    // vehicle in
    Route::get('vehicle-in', 'GateController@vehicleIn')->middleware('entrance');

    Route::post('add-in', 'GateController@addIn');
    // vehicle out
    Route::get('check-out-data/{id}','GateController@checkOutData');
    Route::get('vehicle-out', 'GateController@vehicleOutView')->middleware('exitg');
    Route::post('update-parking','GateController@updateParking');

    Route::get('ticket-pdf/{$data}','GateController@generate_pdf');

    // vehicle monitoring
    Route::get('vehicle-monitoring-in', 'GateController@vehicleMonitoringIn');
    Route::get('vehicle-monitoring-out', 'GateController@vehicleMonitoringOut');

    Route::post('edit-password', 'AdminController@editPassword');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  });
});


Route::get('/', function () {
  return view('welcome');
});

Route::post('no','GateController@insertGate');
Route::get('test','GateController@indexGate')->middleware('auth');


//login
Route::get('/',function(){
  return view('auth.login');
})->middleware('guest');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
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

Route::get('/home2', 'HomeController@index')->name('home');


Route::get('calendar', function () {
  return view('calendar');
});
