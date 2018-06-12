@extends('layouts.app')

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Add Parking Location </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Parking Location Name</label>
                        <input class="form-control" placeholder="Enter Parking Location Name Here....">
                        <div class="form-group">
                            <br>
                            <label>Description</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Add Parking Location</button>
                        </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                     <div class="col-lg-15">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Parking Location List</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Parking Location</th>
                                            <th>Details</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <td>Old Gym</td>
                                            <td><button type="button" class="btn btn-success">View</button></td>
                                            <td> <button type="button" class="btn btn-danger">Delete</button> <button type="button" class="btn btn-info">Edit</button> </td>
                                        </tr>
                                        <tr class="success">
                                            <td>Minerva</td>
                                            <td><button type="button" class="btn btn-success">View</button></td>
                                            <td> <button type="button" class="btn btn-danger">Delete</button> <button type="button" class="btn btn-info">Edit</button> </td>
                                        </tr>
                                        <tr class="success">
                                            <td>Centennial Gym</td>
                                            <td><button type="button" class="btn btn-success">View</button></td>
                                            <td> <button type="button" class="btn btn-danger">Delete</button> <button type="button" class="btn btn-info">Edit</button> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    <!-- /.panel -->
                </div>

@endsection
