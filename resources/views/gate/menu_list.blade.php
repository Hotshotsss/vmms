@extends('layouts.menu_app')

@section('content')
<div class="col-lg-4 no-padding" style="min-height: 520px;">
  <a href="vehicle-in">
    <div class="parking" onmouseover="bigParking()" onmouseout="normalParking()">
      <div class="panel-body centerContent parkingContent">
          <center>
            <i class="fas fa-sign-out-alt" aria-hidden="true" style="font-size:120px"></i>
            <h1>Vehicle In</h1>
        </center>
      </div>
    </div>
  </a>
</div>

<div class="col-lg-4 no-padding">
  <a href="vehicle-monitoring-in">
    <div class="report" onmouseover="bigReport()" onmouseout="normalReport()">
      <div class="panel-body centerContent reportContent">
          <center>
              <i class="fas fa-desktop" style="font-size:120px"></i>
            <h1>Vehicle Monitoring In</h1>
        </center>
      </div>
    </div>
  </a>
</div>

<div class="col-lg-4 no-padding">
  <a href="vehicle-monitoring-out">
    <div class="report" onmouseover="bigReport()" onmouseout="normalReport()">
      <div class="panel-body centerContent reportContent">
          <center>
              <i class="fas fa-desktop" style="font-size:120px"></i>
            <h1>Vehicle Monitoring Out</h1>
        </center>
      </div>
    </div>
  </a>
</div>

<div class="col-lg-6 no-padding">
  <a href="vehicle-out">
    <div class="report" onmouseover="bigReport()" onmouseout="normalReport()">
      <div class="panel-body centerContent reportContent">
          <center>
              <i class="fas fa-sign-out-alt" style="font-size:120px"></i>
            <h1>Vehicle Out</h1>
        </center>
      </div>
    </div>
  </a>
</div>

<!-- <div class="col-lg-6">
  <div class="panel-body">
      <center><a href="vehicle-monitoring-in"><img src = "..\img\search.png" width = "100px" height="100px"></a></center>
      <center><span><h2>Vehicle Monitoring In</h2></span></center>
  </div>
</div> -->

  <!-- <div class="col-lg-12 no-padding" style="min-height: 520px;">
    <a href="vehicle-in">
      <div class="parking" onmouseover="bigParking()" onmouseout="normalParking()">
        <div class="panel-body centerContent parkingContent">
            <center>
              <i class="fas fa-sign-out-alt" aria-hidden="true" style="font-size:120px"></i>
              <h1>Vehicle In</h1>
          </center>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-12 no-padding">
    <a href="menu.php?webpage=vehicle_report">
      <div class="report" onmouseover="bigReport()" onmouseout="normalReport()">
        <div class="panel-body centerContent reportContent">
            <center>
                <i class="fas fa-chart-line" style="font-size:120px"></i>
              <h1>Vehicle Report</h1>
          </center>
        </div>
      </div>
    </a>

  </div>
 -->

    <!-- <div class="col-lg-6">
      <div class="panel-body">
          <center><a href="vehicle-out"><img src = "..\img\signout.png" width = "100px" height="100px"></a></center>
          <center><span><h2>Vehicle Out</h2></span></center>
      </div>
    </div>
  </div> -->

    <!-- <div class="col-lg-6">
      <div class="panel-body">
          <center><a href="vehicle-monitoring-out"><img src = "..\img\search.png" width = "100px" height="100px"></a></center>
          <center><span><h2>Vehicle Monitoring Out</h2></span></center>
      </div>
    </div> -->

  @endsection
