@extends('layouts.monitoring')

@section('content')


<div class="col-lg-12">
  <center><h1 class="page-header">Vehicle Monitoring</h1></center>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center><b>List of Vehicles</b></center>

          <div class="pull-right">
            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body" onclick="filterContent()">
              <i class="glyphicon glyphicon-filter"></i>
            </span>
          </div>

        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dev-table">
              <div class="panel-body1">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
              </div><br>
              <thead>
                <tr>
                  <th>Time In</th>
                  <th>Plate Number</th>
                  <th>Vehicle Model</th>
                  <th>Vehicle Type</th>
                  <th>Purpose</th>
                  <th>Existing Violation</th>
                  <th>Remarks</th>
                  <th>Color</th>
                  <th>Location</th>
                  <th>Add Violation</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($car as $value)
                <tr>
                  <th>{{$value->time_in}}</th>
                  <th>{{$value->plate_number}}</th>
                  <th>{{$value->vehicle_model}}</th>
                  <th>{{$value->carType ? $value->carType->type : ''}}</th>
                  <th>{{$value->inPurpose->purpose}}</th>
                  <th>
                    @foreach($value->violations as $violation)
                    <li>{{$violation->violation_name->violation}}</li>
                    @endforeach
                  </th>
                  <th>
                    @if($value->remarks)
                    {{$value->remarks}}
                    <b><a href="#!" data-id="{{$value}}" id="edit-remarks" style="float:right;">edit</a></b>
                    @else
                    <center><a href="#!" data-id="{{$value}}" type="submit" id="open-remarks" class="btn btn-primary" name="id">Add</a></center>
                    @endif
                  </th>
                  <th>
                    @if($value->vehicle_color)
                    {{$value->vehicle_color}}
                    <b><a href="#!" data-id="{{$value}}" id="edit-color" style="float:right;">edit</a></b>
                    @else

                    <select class = "form-control select-color" data-id="{{$value}}"  name = "txt-vehiclecolor">
                      <option disabled selected>Select Color:</option>
                      <option value="Red">Red</option>
                      <option value="Blue">Blue</option>
                      <option value="Yellow">Yellow</option>
                      <option value="Black">Black</option>
                      <option value="Orange">Orange</option>
                      <option value="White">White</option>
                    </select>
                    @endif
                  </th>
                  <th>
                    @if($value->location_id)
                      {{$value->location->parking_name}}
                    <b><a href="#!" data-id="{{$value}}" id="edit-location" style="float:right;">edit</a></b>
                    @else
                    <div class="form-group">
                      <!-- <label for="sel1">Select list:</label> -->

                      <select class="form-control select-location" data-id="{{$value}}">
                        <option disabled selected>Select Location:</option>
                        @foreach ($locations as $value)
                        <option value="{{$value->id}}">{{$value->parking_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @endif
                  </th>
                  <th>
                    <div class="form-group">
                      <!-- <label for="sel1">Select list:</label> -->

                      <select class="form-control select-violation" data-id="{{$value}}">
                        <option disabled selected>Select Violation:</option>
                        @foreach ($type as $value)
                        <option value="{{$value->id}}">{{$value->violation}}</option>
                        @endforeach
                      </select>

                    </div>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="confirmLocation" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/add-location','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>
            <p id="location">Add Location :
              <b id="valueLocation"></b>
              <input id="locationID" type="hidden" name="locationID">
            </p>

            <button type="submit" class="btn btn-primary" name="id">Yes</button>
            <button type="button" class="btn btn-danger close-violation" name="button">No</button>

          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>

<div id="confirmViolation" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/add-violation','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>

            <p id="violation">Add Violation :
              <b id="valueViolation"></b>
              <input id="violationID" type="hidden" name="violationID">
            </p>

            <button type="submit" class="btn btn-primary" name="id">Yes</button>
            <button type="button" class="btn btn-danger close-violation" name="button">No</button>

          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>

<div id="editLocation" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/edit-location','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Select Location: </h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>

            <div class="form-group">
              <!-- <label for="sel1">Select list:</label> -->
              <select name="locationID" class="form-control select-edit-location">
                <option disabled selected>Select Location:</option>
                @if($locations->isNotEmpty())
                @foreach ($locations as $value)
                <option value="{{$value->id}}">{{$value->parking_name}}</option>
                @endforeach
                @else
                <option value="" disabled>No location found!</option>
                @endif
              </select>
              <br>

              <button type="submit" class="btn btn-primary" name="id">Edit</button>
              <button type="button" class="btn btn-danger close-violation" name="button">Cancel</button>

            </div>
          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>

@if(Auth::check() && Auth::user()->temporary_password)
<div id="editPassword" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    {{Form::open(['url'=>'monitoring/edit-password','method'=>'post'])}}
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

<div id="confirmColor" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/add-color','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>

            <p id="color">Add Color :
              <b id="valueColor"></b>
              <input id="colorName" type="hidden" name="colorName">
            </p>

            <button type="submit" class="btn btn-primary" name="id">Yes</button>
            <button type="button" class="btn btn-danger close-color" name="button">No</button>

          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>

<div id="editColor" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/edit-color','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>

            <select class = "form-control select-editcolor" data-id="{{$value}}" name = "color">
              <option disabled selected>Select Color:</option>
              <option value="Red">Red</option>
              <option value="Blue">Blue</option>
              <option value="Yellow">Yellow</option>
              <option value="Black">Black</option>
              <option value="Orange">Orange</option>
              <option value="White">White</option>
            </select>
            <br>

            <button type="submit" class="btn btn-primary" name="id">Yes</button>
            <button type="button" class="btn btn-danger close-color" name="button">No</button>

          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>

<div id="addRemarks" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/add-remarks','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>

            <p id="remarks">Add Remarks :
              <b id="valueRemarks"></b>
              <input id="remarks" class = "form-control" type="text" name="remarks" placeholder="Please enter remarks">
            </p>

            <button type="submit" class="btn btn-primary" name="id">Yes</button>
            <button type="button" class="btn btn-danger close-remarks" name="button">No</button>

          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>

<div id="editRemarks" class="modal fade">
  <div class = "modal-dialog modal-sm ">
    <div class = "modal-content">
      {!! Form::open(['url'=>'monitoring/edit-remarks','method'=>'post']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div id ="d1" style="visibility: hidden;">Display</div>

          <center>

            <p id="remarks">Edit Remarks :
              <b id="valueRemarks"></b>
              <input id="remarks" class = "form-control" type="text" name="remarks" placeholder="Please enter remarks">
            </p>

            <button type="submit" class="btn btn-primary" name="id">Yes</button>
            <button type="button" class="btn btn-danger close-editremarks" name="button">No</button>

          </center>

        </div>
      </div>

      {!!Form::close()!!}
    </div>
  </div>
</div>


@endsection
