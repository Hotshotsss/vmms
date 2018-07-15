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
          <div style="overflow:auto;">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dev-table">
              <div class="panel-body1">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
              </div><br>
              <thead>
                <tr>
                  <th>Time In</th>
                  <th>Plate Number</th>
                  <th>Vehicle Model</th>
                  <th>Vehicle Type</th>
                  <th>Vehicle Color</th>
                  <th>Vehicle Remarks</th>
                  <th>Purpose</th>
                  <th>Add Color</th>
                  <th>Add Remarks</th>
                  <th>Existing Violation</th>
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
                  <th>{{$value->carType->type}}</th>
                  <th>{{$value->vehicle_color}}</th>
                  <th>{{$value->remarks}}</th>
                  <th>{{$value->inPurpose->purpose}}</th>
                  <th>
                    <select class = "form-control select-color" data-id="{{$value}}" name = "txt-vehiclecolor">

                      <option value="Red">Red</option>
                      <option value="Blue">Blue</option>
                      <option value="Yellow">Yellow</option>
                      <option value="Black">Black</option>
                      <option value="Orange">Orange</option>
                      <option value="White">White</option>

                    </select>
                  </th>
                  <th>
                    <input type="text" name="txt-remarks" value="remarks" placeholder="Enter Remarks">
                    <center><button type="submit" class="btn btn-primary open-remarks" name="id">Submit</button></center>
                  </th>
                  <th>
                    @foreach($value->violations as $violation)
                    <li>{{$violation->violation_name->violation}}</li>
                    @endforeach
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

<div id="confirmRemarks" class="modal fade">
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

@endsection
