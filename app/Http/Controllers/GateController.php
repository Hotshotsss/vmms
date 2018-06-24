<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Vehicle;
use App\Car;
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

    public function MenuList(){
      return view('gate.menu_list');
    }

    public function Vehicle_In(){
      $data = Vehicle::select('vehicle_type')->get();

      return view('gate.VehicleIn')->with('vehicle',$data);
    }

    public function Vehicle_InAdd(Request $request){
      // dd($request);
      $car = new Car;
      $car->car_plate = Input::get("txt-plate");
      $car->vehicle_model = Input::get("txt-model");
      $car->vehicle_reason = Input::get("txt-purpose");
      $car->vehicle_type = Input::get("txt-vehicletype");
      $car->save();
      return redirect()->back();

    }

    public function Vehicle_Out(){
      $data = Car::all();

      return view('gate.VehicleOut')->with('car',$data);
    }

    public function Vehicle_Monitoring(){
      $data = Car::all();

      return view('gate.VehicleMonitoring')->with('car',$data);;
    }
}
