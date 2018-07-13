@extends('layouts.admin_app')

@section('content')
  <div id="page-wrapper">
    <div id="data-content">
      <div class="row">
        <div class="col-lg-12">
          <h1>View Reports</h1>
          <hr>
        </div>
          <div class="col-lg-12 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                <p>Incoming Payments</p>
                <div class="form-group" style="width:50%;display:-webkit-inline-box;">
                  <select class="form-control" id="filterSelect">
                    <option value="/admin/reports/daily" style="display:none;">{{$day}}</option>
                    <option value="/admin/reports/daily">1 Day Ago</option>
                    <option value="/admin/reports/weekly">7 Days Ago</option>
                    <option value="/admin/reports/monthly">30 Days Ago</option>
                    <option value="/admin/reports/yearly">365 Days Ago</option>
                  </select>
                </div>
                <div class="form-group" style="width:50%;display:inline;">
                  <a href="/admin/reportPDF/{{$param}}" target="_blank"><button type="button" class="btn btn-primary" name="button" style="right: 0;position: absolute;margin-right: 20px;">Download as PDF</button></a>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dev-table">

                    <thead>
                        <tr>
                             <th>Time In</th>
                             <th>Time Out</th>
                             <th>Plate Number</th>
                             <th>Vehicle Model</th>
                             <th>Vehicle Type</th>
                             <th>Vehicle Color</th>
                             <th>Vehicle Remarks</th>
                             <th>Purpose</th>
                             <th>Amount Paid</th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach ($cars as $value)
                          <tr>
                                 <th>{{$value->time_in}}</th>
                                 <th>{{$value->time_out}}</th>
                                 <th>{{$value->plate_number}}</th>
                                 <th>{{$value->vehicle_model}}</th>
                                 <th>{{$value->carType->type}}</th>
                                 <th>{{$value->vehicle_color}}</th>
                                 <th>{{$value->remarks}}</th>
                                 <th>{{$value->inPurpose->purpose}}</th>
                                 <th>{{$value->time_in}}</th>
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
  <!-- /#page-wrapper -->
@endsection
