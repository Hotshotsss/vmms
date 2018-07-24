<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
  </head>
  <style media="screen">
    .col-lg-3{
      float:left;
      width: 35%;
    }
    .col-lg-9{
      float:left;
      width:100%;
    }
    .col-lg-12{
      float: left;
      width: 100%;
    }
    th{
      border:1px solid black;
    }
    @page { margin: 0px; }
    body { margin: 0px; }
    thead:before, thead:after { display: none; }
tbody:before, tbody:after { display: none; }
.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #000;
}
.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #000;
}

table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}
td{
  font-size: 13px;
  font-weight: bold;
}
  </style>
  <body style="margin:0px 20px;">
    <div class="col-lg-3">
      <img src="img/Mcu_logo01.jpg" alt="" style="width:40%;">
    </div>
    <div class="col-lg-9" style="margin-left:-900px;padding-top:20px;">
      <center>
        <h1 style="font-weight:bolder;margin-bottom:0px;">Manila Central University</h1>
        <p style="margin:0px;font-size:20px;font-weight:normal;">Samson Road, Brgy. 84 Zone 8 District I, Caloocan City</p>
        <p style="margin:0px;font-size:20px;font-weight:normal;">VAT Reg TIN: 000-786-571-001</p>
      </center>
    </div>
    <table width="100%" class="table table-bordered" id="dev-table" style="padding-top:200px;">

      <thead>
          <tr>
               <th>Time In</th>
               <th>Time Out</th>
               <th >Plate Number</th>
               <th >Vehicle Model</th>
               <th >Vehicle Type</th>
               <th >Vehicle Color</th>
               <th >Vehicle Remarks</th>
               <th>Violation</th>
               <th>Purpose</th>
               <th>Amount Paid</th>
          </tr>

      </thead>
      <tbody>
           @foreach ($car as $value)
            <tr>
                   <td>{{$value->time_in}}</td>
                   <td>{{$value->time_out}}</td>
                   <td>{{$value->plate_number}}</td>
                   <td>{{$value->vehicle_model}}</td>
                   <td>{{$value->carType->type}}</td>
                   <td>{{$value->vehicle_color}}</td>
                   <td>{{$value->remarks}}</td>
                   <th>
                     @foreach($value->violations as $violation)
                     @if($violation->violation_name)
                     {{$violation->violation_name->violation }}<br>
                     @endif
                     @endforeach
                   </th>
                   <td>{{$value->inPurpose->purpose}}</td>
                   <td>{{$value->payment_status}}</td>
            </tr>
           @endforeach
      </tbody>
    </table>
  </body>
</html>
