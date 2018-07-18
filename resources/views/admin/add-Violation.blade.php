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
            <div class="table-responsive">
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
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="edit-violation" data-id="{{$value}}">Edit</a></li>
                            <li class="divider"></li>
                            <li>
                            {!!Form::open(['url'=>'admin/delete-violation','method'=>'post','onsubmit'=>'return confirm("Are you sure you want to delete the item?")'])!!}
                              <button style="display: flex;-webkit-appearance: caret;padding: 3px 20px;color:#333;background:none;font-weight:normal" type="submit" name="type_number" value="{{$value->id}}">Delete</button>
                            {{Form::close()}}
                          </li>
                          </ul>
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

<!-- Modal -->
<div class="modal fade" id="editViolation" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Violation Details</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          {!!Form::open(['url'=>'admin/edit-violation','method'=>'post']) !!}

          <div class="form-group">
            <label>Violation</label>
            <input type="text" class="form-control" placeholder="Enter Violation" name="violation" required>
          </div>
          <div class="form-group">
            <label>Penalty</label>
            <input type="text" class="form-control" placeholder="Enter Penalty" name="penalty" required>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <center>
          <button type="submit" class="btn btn-default" name="id">Submit</button>
        </center>
      </div>
      {!!Form::close() !!}
    </div>

  </div>
</div>

@endsection
