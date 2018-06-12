@extends('layouts.app')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Input Information </h1>


                </div>
                <!-- /.col-lg-12 -->
            </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <form method="POST" action="UserSettings.php">
                            <label> Last Name: </label>
                            <input type='txt' name="lastname" pattern="[A-Za-z-ñ]{2,}" title="letter only" id="mytextbox" onkeyup="javascript:capitalize(this.id, this.value);"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> First Name: </label>
                            <input type='txt' name="firstname" pattern="[A-Za-z-ñ]{2,}" title="letter only" id="mytextbox1" onkeyup="javascript:capitalize(this.id, this.value);"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Middle Initial: </label>
                            <input type='txt' name="midname"  pattern="[A-Za-z-ñ]{1}" title="one letter only" id="mytextbox2" onkeyup="javascript:capitalize(this.id, this.value);"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Username: </label>
                            <input type='txt' name="username"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Password: </label>
                            <input type='password' name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Confirm Password:</label>
                            <input type='password' name="cpassword"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label>User Type:<label>
                        <select name = "usertype">
                        <option value ='Administrator'>Administrator</option>
                            <option value ='MainGate'>MainGate</option>
                            <option value ='Monitoring'>Monitoring</option>
                            <option value ='ExitGate'>ExitGate</option>
                        </select>

                    <!-- /.col-lg-4 -->
                        </div>
                            <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-submit">Submit Button</button>



                    <!-- /.col-lg-12 -->



            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
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
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($data as $value)
                                  <tr>
                                      <th>{{$value->user_id}}</th>
                                      <th>{{$value->last_name}}</th>
                                      <th>{{$value->username}}</th>
                                      <th>{{$value->password}}</th>
                                      <th>{{$value->user_type}}</th>
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
