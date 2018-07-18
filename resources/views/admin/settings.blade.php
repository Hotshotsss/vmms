@extends('layouts.admin_app')
@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"> Input Information </h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div id="addUser" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      {{Form::open(['url'=>'admin/register','method'=>'post'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h2 class="modal-title"><b>Add User</b></h2></center>
        </div>

        @if(isset($errors) && count($errors->registration) > 0)
        <div id="div-login-msg" class="alert alert-danger">
          @foreach ($errors->registration->all() as $error)
          <li style="list-style: none;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ $error}}</li>
          @endforeach
        </div>
        @endif
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" name="type" id="sel1">
                  <option value="0">Administrator</option>
                  <option value="1">Gate or Monitoring</option>
                </select>
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label> Last Name: </label>
                <input type="text" name="lastname" class="form-control" maxlength="255" pattern="[A-Za-z-ñ ]{2,}" title="letter only" placeholder="Enter Lastname" required>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label> First Name: </label>
                <input  type="text" name="firstname"  class="form-control" maxlength="255" pattern="[A-Za-z-ñ ]{2,}" title="letter only" placeholder="Enter Firstname"  required>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label> Middle Initial: </label>
                <input  type="text" name="midname" class="form-control" maxlength="1" pattern="[A-Za-z-ñ]{1}" title="one letter only" placeholder="Enter Initial" required>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label> Username: </label>
                <input type="text"  class="form-control" name="username" maxlength="22"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" placeholder="Enter Username" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label> Password: </label>
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
              <button type="submit" class="btn btn-primary" name="btn-submit">Submit</button>
            </center>
          </div>
        </div>
      </div>
      {{Form::close()}}
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">

          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add User</button>

        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>User Type</th>
                  <th>Temporary Password</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($accounts as $value)
                <tr>
                  <th>{{$value->id}}</th>
                  <th>{{$value->name}}</th>
                  <th>{{$value->username}}</th>
                  <th>{{Transearly::type($value->type)}}</th>
                  <th>{{$value->temporary_password}}</th>
                  <th>
                    <center>
                      <div class="btn-group show-on-hover">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" id="edit-user" data-id="{{$value}}">Edit</a></li>
                          <li><a href="#" id="edit-password" data-id="{{$value}}">Change Password</a></li>
                          <li class="divider"></li>
                          <li>
                            {{Form::open(['url'=>'admin/delete-user','method'=>'post','onsubmit'=>'return confirm("Are you sure you want to delete this user?")'])}}
                            <button style="display: flex;-webkit-appearance: caret;padding: 3px 20px;background:none;font-weight:normal;color:#333" type="submit" name="delete" value="{{$value->id}}">Delete User</button>
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
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.col-lg-12 -->
</div>

<div id="editUser" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    {{Form::open(['url'=>'admin/edit-user','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title"><b>Edit User</b></h2></center>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="sel1">Select list:</label>
              <select class="form-control" name="type" id="sel1">
                <option value="0">Administrator</option>
                <option value="1">Gate or Monitoring</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label> Name: </label>
              <input  type="text" name="name" class="form-control" maxlength="255"   placeholder="Enter Initial" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label> Username: </label>
              <input type="text"  class="form-control" name="username" maxlength="22"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" placeholder="Enter Username" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <center>
            <button type="submit" class="btn btn-primary" name="edit">Submit</button>
          </center>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>

<div id="editPassword" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    {{Form::open(['url'=>'admin/edit-password','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
              <input type="text" readonly name="username" class="form-control" placeholder="Enter Username" value="{{old('username')}}" required>
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
            <button type="submit" class="btn btn-primary" value="{{old('change')}}" name="change">Submit</button>
          </center>
        </div>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>



@endsection
