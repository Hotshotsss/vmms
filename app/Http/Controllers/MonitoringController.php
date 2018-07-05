<?php

namespace App\Http\Controllers;

use App\Parking;
use App\Violation;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function Home(){
        $data = Parking::all();
        $violation = Violation::all();

      return view('monitoring.home')->with(['car'=>$data,'type'=>$violation]);
    }

    public function addViolation(){
        $data = Violation::all();

      return view('monitoring.home')->with('violation',$data);
    }
}
