<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use App\Car;
// use App\Account;
use App\CarType;
use App\Parking;
use Carbon\Carbon;
use PDF;
use App;
use Illuminate\Support\Facades\Input;


class GateController extends Controller
{
    public function indexGate(){
      $data = User::find(1);
      // dd($data);
      $data->name = "Joyce sAnn";
      $data->save();

      return view('gate.test')->with('data_view',$data);
    }
    public function Home(){
      return view('admin.home');
    }





    public function UserSets(){

      $data = Account::all();

      return view('admin.UserSettings')->with('accounts',$data);
    }

    public function RateSets(){
      return view('admin.RateSettings');
    }






    public function insertGate(Request $request){

      // $newUser = new User();
      // $newUser->name = $request->name;
      // $newUser->email = $request->email;
      // $newUser->password = Hash::make($request->password);
      // $newUser->save();

    }

    public function generate_pdf() {

      $pdf = App::make('dompdf.wrapper');
      $pdf->loadView('gate.PDF');
      return $pdf->stream();
    }

    public function menu(){
      return view('gate.menu_list');
    }

    public function vehicleIn(){
      $data = CarType::all();

      return view('gate.VehicleIn')->with('vehicle',$data);
    }

    public function addIn(Request $request){
      // dd($request);
      $car = new Parking;
      $car->plate_number = Input::get("txt-plate");
      $car->vehicle_model = Input::get("txt-model");
      $car->parking_reason = Input::get("txt-purpose");
      $car->car_type_id = Input::get("txt-vehicletype");
      $car->time_in = Carbon::now();

      $car->save();
      return redirect()->back();

    }

    public function vehicleOutView(){
      $data = Parking::where('time_out','=',NULL)->get();

      return view('gate.VehicleOut')->with('car',$data);
    }

    public function vehicleMonitoring(){
      $data = Parking::all();

      return view('gate.VehicleMonitoring')->with('car',$data);;
    }

    public function vehicleMonitoringID(Request $request){

      $carID = Car::where('car_id',$car_id)->first();

      return redirect()->back();
    }

    public function updateParking(Request $request){
      $data = Parking::find($request->out);

      $data->time_out = Carbon::now();

      $data->save();
      return redirect()->back();

    }

}
