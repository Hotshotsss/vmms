@extends('layouts.admin_app')

@section('content')
<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12 center">
        <h1>Violation Settings</h1>
        <hr>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            Add Violation
          </div>
          <div class="panel-body">
            {!! Form::open(['url'=>'admin/add-violation','method'=>'post']) !!}
            <div class="form-group">
              <label for="type">Violation</label>
              <input type="text" id="violation" class="form-control" name="violation" placeholder="Enter violation you want to add" required>
              <label for="type">Penalty</label>
              <input type="text" id="penalty" class="form-control" name="penalty" placeholder="Enter penalty for violation" required>
            </div>
            <center>
              <button type="submit" class="btn btn-default" name="button">Submit</button>
            </center>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">Available Violations</div>
          <div class="panel-body">
            <div style="overflow:auto">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Violations</th>
                    <th>Penalty</th>
                    <th style="text-align:center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($violations as $value)
                  <tr>
                    <th>{{$value->violation}}</th>
                    <th>{{$value->penalty}}</th>
                    <th>
                      <center>
                      <div class="btn-group show-on-hover">
                        {!!Form::open(['url'=>'admin/delete-violation','method'=>'post','onsubmit'=>'return confirm("Are you sure you want to delete the item?")'])!!}
                        <input type="hidden" name="type_number" value="{{$value->id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!!Form::close() !!}
                      </div>
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
<!-- /#page-wrapper -->
@endsection
