<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GateController extends Controller
{
    public function indexGate(){
      $data = User::find(1);
      // dd($data);
      $data->name = "Joyce sAnn";
      $data->save();

      return view('gate.test')->with('data_view',$data);
    }
    public function Gate2(){
      return "Gate 2";
    }

    public function insertGate(Request $request){

      // $newUser = new User();
      // $newUser->name = $request->name;
      // $newUser->email = $request->email;
      // $newUser->password = Hash::make($request->password);
      // $newUser->save();

    }
}
