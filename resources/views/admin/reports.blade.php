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
              <div class="panel-heading">Incoming Payments
                <div class="form-group">
                  <select class="form-control" id="filterSelect">
                    <option value="/admin/reports/daily" style="display:none;">{{$day}}</option>
                    <option value="/admin/reports/daily">1 Day Ago</option>
                    <option value="/admin/reports/weekly">7 Days Ago</option>
                    <option value="/admin/reports/monthly">30 Days Ago</option>
                    <option value="/admin/reports/yearly">365 Days Ago</option>
                  </select>
                </div>
              </div>
              <div class="panel-body">
                <div style="overflow:auto">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $user)
                        <tr>
                        <td>{{$user -> id}}</td>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td><button type="button" class="btn btn-primary">Update</button></td>
                        <td><button type="button" class="btn btn-danger">Delete</button></td>
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
