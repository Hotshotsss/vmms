@extends('layouts.menu_app')

@section('content')
<div class="col-lg-12">
  <center><h1 class="page-header">Main Menu</h1></center>
</div>

<div class="col-lg-6">
  <div class="panel-body">
    <p>
      <center><a href="vehicle-in"><img src = {{URL::asset('/img/signin.png')}} width = "100px" height="100px"></a></center>
      <center><span><h2>Vehicle In</h2></span></center>
    </p>
  </div>
</div>

<div class="col-lg-6">
  <div class="panel-body">
    <p>
      <center><a href="vehicle-out"><img src = "..\img\signout.png" width = "100px" height="100px"></a></center>
      <center><span><h2>Vehicle Out</h2></span></center>
    </p>
  </div>
</div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="panel-body">
      <p>
        <center><a href="vehicle-monitoring"><img src = "..\img\search.png" width = "100px" height="100px"></a></center>
        <center><span><h2>Vehicle Monitoring</h2></span></center>
      </p>
    </div>
  </div>

  @endsection
