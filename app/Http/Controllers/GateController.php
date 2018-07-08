<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
// use App\Car;
// use App\Account;
use App\CarType;
use App\Parking;
use Carbon\Carbon;
use PDF;
use App;

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

    public function AddParkLocation(){
      return view('admin.AddParkingLocation');
    }

    public function AddCar(){
      return view('admin.AddCarType');
    }

    public function UserSets(){

      $data = Account::all();

      return view('admin.UserSettings')->with('accounts',$data);
    }

    public function RateSets(){
      return view('admin.RateSettings');
    }

    public function Reports(){

      return view('admin.ViewReports');

    }

    public function Discount(){

      return view('admin.Discount');

    }

    public function FlatRate(){

      return view('admin.FlatRate');

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
      $customPaper = array(30,-50,240,270);
      $pdf->setPaper($customPaper);
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
      $data = Parking::where('time_out',null)->with(['violations.violation_name'])->get();

      return view('gate.VehicleOut')->with('car',$data);
    }

    public function vehicleMonitoring(){
      $carin = Parking::where('time_out',null)->get();
      $carout = Parking::all();

      return view('gate.VehicleMonitoring')->with(['carin'=>$carin,'carout'=>$carout]);
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
