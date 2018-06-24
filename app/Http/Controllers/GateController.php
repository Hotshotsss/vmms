<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
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
}
