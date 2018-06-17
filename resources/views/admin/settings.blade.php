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
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center><h2 class="modal-title"><b>Add User</b></h2></center>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <form method="POST" action="UserSettings.php">
                                <label> Last Name: </label>
                                <input type='txt' name="lastname" pattern="[A-Za-z-ñ]{2,}" title="letter only" id="mytextbox" onkeyup="javascript:capitalize(this.id, this.value);"
                                <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> First Name: </label>
                                <input type='txt' name="firstname" pattern="[A-Za-z-ñ]{2,}" title="letter only" id="mytextbox1" onkeyup="javascript:capitalize(this.id, this.value);"
                                <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Middle Initial: </label>
                                <input type='txt' name="midname"  pattern="[A-Za-z-ñ]{1}" title="one letter only" id="mytextbox2" onkeyup="javascript:capitalize(this.id, this.value);"
                                <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Username: </label>
                                <input type='txt' name="username"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters"
                                <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Password: </label>
                                <input type='password' name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters"
                                <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Confirm Password:</label>
                                <input type='password' name="cpassword"
                                <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1">
                              <option>Administrator</option>
                              <option>Gate</option>
                              <option>Monitoring</option>
                            </select>

                          </div>
                                <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-submit">Submit Button</button>
                      </div>
                    </div>
                  </div>




                  <div class="modal-footer">
                  </div>
                </div>

              </div>
            </div>
          </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables

                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Submit</button>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>User Type</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($accounts as $value)
                                  <tr>
                                      <th>{{$value->user_id}}</th>
                                      <th>{{$value->last_name}} {{$value->last_name}} {{$value->last_name}}</th>
                                      <th>{{$value->username}}</th>
                                      <th>{{$value->password}}</th>
                                      <th>{{$value->user_type}}</th>
                                      <th><button type="button" class="btn btn-primary">Update</button></th>
                                      <th><button type="button" class="btn btn-primary">Delete</button></th>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection
