<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
  public function home(Request $request){
    return view('admin.home');
  }

  public function settings(Request $request){
    $data = User::all();

    return view('admin.settings')->with('accounts',$data);
  }
}
