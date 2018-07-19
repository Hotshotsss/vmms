@extends('layouts.menu_app')

@section('content')


<div class="col-lg-12">
  <center><h1 class="page-header">Vehicle Out</h1></center>

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
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
              </div><br>
              <thead>
                <tr>
                  <th>Plate Number</th>
                  <th>Vehicle Model</th>
                  <th>Time In</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($car as $value)
                <tr id="out-tr{{ $loop->iteration }}">
                  <th>{{$value->plate_number}}</th>
                  <th>{{$value->vehicle_model}}</th>
                  <th>{{$value->time_in}}</th>
                  <th align = 'center'>
                    <center>
                      <a href="#" class='btn btn-success' type='button' name = 't2' id="view-details" data-id="{{$value->id}}" value = '$car_id'><span class='glyphicon glyphicon-search'></span> View Details</a>
                    </center>
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

</div>
<div id="vehicleMonitoring" class="modal fade">
  <div class = "modal-dialog modal-lg-dialog">
    <div class = "modal-content modal-lg">
      {!! Form::open(['url'=>'gate/update-parking','method'=>'post','id'=>'checkOut-submit']) !!}
      <div class = "modal-header">
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">

          <div class="col-lg-6">
            <h3 style="margin-top: 0px;text-align:center;font-weight:bold;">Information</h3>
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <td class="col-md-5"> <label>Plate Number: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-plate"> </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Vehicle Model: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-model"> </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Time In: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-timein">  </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Hours: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-hours"> </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Parking Location: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-location">  </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Violation: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-violation">  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-lg-6">
            <h3 style="margin-top: 0px;text-align:center;font-weight:bold;">Payments</h3>

            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <td class="col-md-5"> <label>Less: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-reason">  </td>
                </tr>
                <tr>
                  <td class="col-md-5 input-value" id="first-hours-label" style="font-weight:bold"> <label>First 3 Hours: </label> </td>
                  <td class="col-md-7 input-value" id="first-hours-value"> 40.00 </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Total Rate of Extension: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-exceeding"> </td>
                </tr>
                <tr>
                  <td class="col-md-5"> <label>Penalty: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-penalty">  </td>
                </tr>

                <tr>
                  <td class="col-md-5"> <label>Total Price: </label> </td>
                  <td class="col-md-7 input-value" id="monitoring-total">  </td>
                </tr>
              </table>
            </div>
          </div>


        </div>
        <div class="form-group" id="proof">
          <div class="col-lg-6">
            <label><input type="checkbox" name="hospital_proof"> Doctor's Signature Proof?</label>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border-color:white;">
        <button  type="submit" name="out" class="btn btn-success" formtarget="_blank">Check Out</button>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>
@endsection
