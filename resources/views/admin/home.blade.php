@extends('layouts.admin_app')
@section('content')
<div id="page-wrapper" style="padding-top:20px;">
  <div id="data-content">
    <div class="row" style="color:white;">
      <div class="col-lg-12" style="padding-left:0px;padding-right:2.5px;height:400px;padding-bottom:5px;">
        <div id="map" style="height:100%"></div>
      </div>
      <div class="col-lg-12 col-md-8 col-xs-6" style="padding-left:0px;padding-right:2.5px;padding-bottom:5px;">
        <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#4db151;border-radius:5px;">
          <div class="col-md-4 hidden-sm hidden-xs">
            <i class="fas fa-parking" style="font-size:140px;padding-top:20px;"></i>
          </div>
          <div class="col-md-8" style="padding-top:10px">
            <div style="padding-left:12px;" class="leftParking">
              <h2 style="font-weight:bolder;" class="h1Parking">Total Slots</h2>
              <h1 style="font-size:60px">{{$parkings}} /
                <b style="font-size:30px;">{{$slots->sum('number_of_slots')}}</b>
              </h1>
            </div>
          </div>
        </div>
      </div>

      @foreach($slots as $slot)
      <div class="col-md-4 col-xs-6" style="padding-left:2.5px;padding-right:2.5px;padding-bottom:5px;">
        <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#79c4bb;border-radius: 5px;">
          <h3 style="font-weight:bolder;">{{ucwords(strtolower($slot->parking_name))}}</h3>
          <center>
            <h5 style="font-size:35px;padding-top:30px;">{{$slot->parked->count()}}/
              <b style="font-size:25px;">{{$slot->number_of_slots}}</b>
            </h5>
          </center>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@if(Auth::check() && Auth::user()->temporary_password)
<div id="editPassword2" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    {{Form::open(['url'=>'admin/edit-password','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">

        <center><h2 class="modal-title"><b>Change Password</b></h2></center>
      </div>

      @if(isset($errors) && count($errors->password) > 0)
      <div id="div-login-msg" class="alert alert-danger">
        @foreach ($errors->password->all() as $error)
        <li style="list-style: none;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ $error}}</li>
        @endforeach
      </div>
      @endif
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label> Username: </label>
              <input type="text" readonly name="username" class="form-control" placeholder="Enter Username" value="{{Auth::user()->username}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label> New Password: </label>
              <input type='password'  class="form-control" maxlength="255"  name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters" placeholder="Enter Password" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label> Confirm Password:</label>
              <input type='password'  class="form-control" maxlength="255" name="password_confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters" placeholder="Enter Confirm Passwod" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <center>
            <button type="submit" class="btn btn-primary" value="{{Auth::user()->id}}" name="change">Submit</button>
          </center>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>
@endif
<!-- /#page-wrapper -->
@endsection
