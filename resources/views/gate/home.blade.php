@extends('layouts.menu_app')
@section('content')
<div class="col-sm-4 no-padding containerFull" style="border-right:2px solid #d05ce3">
  <a href="@if(session('user_type') && session('user_type') == 2)vehicle-in @else vehicle-out @endif">
    <div class="parking" onmouseover="bigParking()" onmouseout="normalParking()">
      <div class="panel-body centerContent parkingContent">
          <center>
            <i class="fas fa-sign-out-alt" aria-hidden="true" style="font-size:120px"></i>
            <h1>
              @if(session('user_type') && session('user_type') == 2)
              Vehicle In
              @else
              Vehicle Out
              @endif
            </h1>
        </center>
      </div>
    </div>
  </a>
</div>


<div class="col-sm-4 no-padding containerFull" style="border-right:2px solid #d05ce3">
  <a href="vehicle-monitoring-in">
    <div class="report" onmouseover="bigReport()" onmouseout="normalReport()">
      <div class="panel-body centerContent reportContent">
          <center>
              <i class="fas fa-desktop" style="font-size:120px"></i>
            <h1>Vehicle Monitoring In</h1>
        </center>
      </div>
    </div>
  </a>
</div>

<div class="col-sm-4 no-padding containerFull">
  <a href="vehicle-monitoring-out">
    <div class="reportOut" onmouseover="bigReportOut()" onmouseout="normalReportOut()">
      <div class="panel-body centerContent reportContentOut">
          <center>
              <i class="fas fa-laptop" style="font-size:120px"></i>
            <h1>Vehicle Monitoring Out</h1>
        </center>
      </div>
    </div>
  </a>
</div>

@if(Auth::check() && Auth::user()->temporary_password)
<div id="editPassword" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    {{Form::open(['url'=>'gate/edit-password','method'=>'post'])}}
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

  @endsection
