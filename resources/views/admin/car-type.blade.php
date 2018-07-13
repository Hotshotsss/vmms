@extends('layouts.admin_app')

@section('content')
<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12 center">
        <h1>Car Settings</h1>
        <hr>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            Add Car Type
          </div>
          <div class="panel-body">
            {!! Form::open(['url'=>'admin/add-car','method'=>'post']) !!}
            <div class="form-group">
              <label for="type">Car Type</label>
              <input type="text" id="type" class="form-control" name="type" placeholder="Enter type (e.g four wheeler)" required>
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
          <div class="panel-heading">Available Cars</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Car Types</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cars as $value)
                  <tr>
                    <th>{{$value->type}}
                      <div class="btn-group show-on-hover pull-right">
                        {!!Form::open(['url'=>'admin/delete-car','method'=>'post','onsubmit'=>'return confirm("Are you sure you want to delete the item?")'])!!}
                        <input type="hidden" name="type_number" value="{{$value->id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {!!Form::close() !!}
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
</div>
<!-- /#page-wrapper -->
@endsection
