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
p{
  font-size: .35em;
  margin: 0px;
}
body{
  width: 100%;
  font-size: .35em;
}
@page { margin: 0px; }
body { margin: 0px; }
</style>
<body style="margin:0px 20px;">

  <div class="col-lg-3">
    <img src="img/Mcu_logo01.jpg" alt="" style="width:50px;">
  </div>
  <div class="col-lg-9" style="padding-top:10px;margin-left:-150px;">
    <center
    <h5 style="font-size:10px;font-weight:bolder;">Manila Central University</h3>
      <p style="margin:0px;font-size: 6px;font-weight:normal;">Samson Road, Brgy. 84 Zone 8 District I, Caloocan City</p>
      <p style="margin:0px;font-size: 6px;font-weight:normal;">VAT Reg TIN: 000-786-571-001</p>
    </center>
  </div>
  <div>

    <div style="padding-top:40px;">
      <h5 style="font-size:6px;font-weight:bolder;">PARKING TICKET</h3>
        <!-- <div class="" style="padding-left:10px;padding-top:10px;">
        <p style=" display: inline-block; vertical-align: top;">Name: ____________________________________________ &nbsp;</p>
        <p style=" display: inline-block; vertical-align: top;">TIN: __________________________</p>
        <p style=" display: inline-block; vertical-align: top;">Address:
        <u>238B Bacood St. Sta Mesa, Manila &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
      </p> -->
  <!--    <br>
      <p style=" display: inline-block; vertical-align: top;">Bus. Style: _________________________________________ &nbsp;</p>
      <p style=" display: inline-block; vertical-align: top;">Date: __________________________</p><br>
      <p style=" display: inline-block; vertical-align: top;">Plate No. __________________________________________ &nbsp;</p>
      <p style=" display: inline-block; vertical-align: top;">Time Out: ______________________</p>
    </div> -->
    <table style="margin-top:-10px;width:270px;">
      <tr>
        <td width="15%;" style="font-weight:bolder;" style="font-weight:bolder;">Plate number :</td>
        <td width="48%;" style="border-bottom:.1px solid black;">{{$data->plate_number}}</td>
        <td width="17%;" style="font-weight:bolder;">  Discount:</td>
        <td width="20%" style="border-bottom:.1px solid black;">{{$total['discount']}}</td>

      </tr>
    </table>
    <table style="width:270px;">
      <tr>
        <td width="15%;" style="font-weight:bolder;">Date:</td>
        <td width="48%;" style="border-bottom:.1px solid black;">{{\Carbon\Carbon::today()->format('m/d/Y')}}</td>
        <td width="17%;" style="font-weight:bolder;">First  {{$total['standard_hours']}} hours:</td>
        <td width="20%" style="border-bottom:.1px solid black;">PHP {{number_format($total['standard_rate'],2)}}</td>

      </tr>

    </table>
    <table style="width:270px;">
      <tr>
        <td width="15%;" style="font-weight:bolder;">Time In:</td>
        <td width="18%;" style="border-bottom:.1px solid black;">{{\Carbon\Carbon::parse($data->time_in)->format('m-d-y H:i')}}</td>
        <td width="12%;">Time Out:</td>
        <td width="18%;" style="border-bottom:.1px solid black;">{{\Carbon\Carbon::parse($data->time_out)->format('m-d-y H:i')}}</td>
        <td width="17%;" style="font-weight:bolder;">Exceeding Rate:</td>
        <td width="20%" style="border-bottom:.1px solid black;"> PHP {{number_format($total['per_hour'],2)}}</td>
      </tr>

    </table>
    <table style="width:270px">
      <tr>
        <td width="15%;" style="font-weight:bolder;">Total Hours:</td>
        <td width="18%;" style="border-bottom:.1px solid black;">{{$total['duration']}}</td>
        <td width="12%;">Penalty:</td>
        <td width="18%;" style="border-bottom:.1px solid black;">PHP {{$total['penalty']}}</td>
        <td width="17%;" style="font-weight:bolder;">Total:</td>
        <td width="20%;" style="border-bottom:.1px solid black;">PHP {{number_format($total['amount'],2)}}</td>
      </tr>
    </table>
    <table style="width:270px">
      <tr>
        <td>1. Parking Fee:</td>
      </tr>
      <tr>
        <td>&nbsp; &nbsp;a) P40.00 for the first 3 hours plus P10.00 for every succeeding hour for 4 and 6 wheeled vehicles. </td>
      </tr>
      <tr>
        <td>&nbsp; &nbsp;	b) P40.00 for 3 hours for 2 and 3 wheeled vehicles. </td>
      </tr>
      <tr>
        <td>2. Parking Hours: 6:00 A.M. to 9:00 P.M. everyday including holidays.</td>
      </tr>
      <tr>
        <td>3. Pay your parking fee at the designated Cashier.</td>
      </tr>
      <tr>
        <td>4. Present the payment receipt to the security guard upon exit.</td>
      </tr>
      <tr>
        <td>5. Overnight parking is not allowed.</td>
      </tr>
      <tr>
        <td>&nbsp; &nbsp; A parking fee of P500.00 per day will be charged to unauthorized parking.</td>
      </tr>
      <tr>
        <td style="font-size:5px;font-weight:bolder;">
          <center>TERMS AND CONDITIONS</center>
        </td>
      </tr>
      <tr>
        <td>1. This ticket entitles the customer to park one(1) vehicle in the parking areas inside the MCU campus.</td>
      </tr>
      <tr>
        <td>2. This ticket is non-transferable.</td>
      </tr>
      <tr>
        <td>3. The customer will be charged P300.00 for a lost parking ticket in addition to the regular parking charges. Related to this, the campus security records every vehicle that goes in and out of the campus. Those who lose their tickets will be required to present sufficient proof of ownership such as the original certificate of registration, official receipt and legal identifcation cards.</td>
      </tr>
      <tr>
        <td>4. Use of parking space is subject to the parking and traffic rules of the Manila Centrail University (MCU).</td>
      </tr>
      <tr>
        <td>5. MCU shall not be responsible to any damage, loss of the vehicle, its accessories and other items.</td>
      </tr>
      <tr>
        <td>6. The Administration reserves the right to refuse the entry of any vehicle or person.</td>
      </tr>
      <tr>
        <td>7. The customer shall indemnity and shall keep indemnified MCU from any and all claims, demands, actions, suits, damages and cost whatsoever resulting from any death, injury to person, loss or damage to any vehicle and property aising directly or indirectly from the customer's use or presence in the parking area.</td>
      </tr>
      <tr>
        <td>8. A vehicle left in the parking area for more than 24 hours without prior arrangement with the Administration shall be reported to the proper authorities for appropriate action. Any expense in whatever action taken, such as towing, shall be charged to the owner.</td>
      </tr>
      <tr>
        <td style="font-size:5px;font-weight:bolder;">
          <center>*THIS DOCUMENT IS NOT VALID FOR CLAIMING INPUT TAXES*</center>
        </td>
      </tr>
      <tr>
        <td style="font-size:5px;font-weight:bolder;">
          <center>"THIS PARKING TICKET SHALL BE VALID FOR FIVE (5) YEARS FROM THE DATE OF ATP"</center>
        </td>
      </tr>
    </table>
    <table style="width:270px;font-size:4.5px;">
      <tr>
        <td width:50%;>Full Pledge Print Haus * TIN No. 117-828-913-000-VAT</td>
        <td width:50%;>B12 L1 Metrogreen Vill. San Bartolome, Novaliches, Q.C.</td>
      </tr>
      <tr>
        <td>Printer's Accreditation No. 028MP20140000000026 Date Issued: 02-21-2014</td>
        <td>600 Bklts. (50 x 20) 190001-220000</td>
      </tr>
      <tr>
        <td>BIR Authority to Print No. 4AU0001738535</td>
        <td>Date Issued: {{\Carbon\Carbon::today()->format('m/d/Y')}} &nbsp; &nbsp; Valid Until: {{\Carbon\Carbon::today()->addYears(5)->format('m/d/Y')}}</td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
