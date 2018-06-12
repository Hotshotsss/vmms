<?php
include('dbconnection.php');
session_start();
ob_start();


if(isset($_GET['vehicle_out']))
{

	$car_id = $_GET['vehicle_out'];
	require('fpdf17/fpdf.php');

	$pdf = new FPDF('P','in',array(5,8));
	$pdf -> AddPage();
	$pdf->Image('img/Mcu_logo01.jpg',0.4,0,1,0.9,'JPG');
	$pdf -> SetFont('Times','B','14');
	$pdf -> Cell(0,0,' Manila Central University',0,1,C);
	$pdf -> SetFont('Times','','7');
	$pdf -> Cell(0,0.3,'Samson Road, Bgy. 84 Zone 8 District I, Caloocan City',0,1,C);
	$pdf -> Cell(0,0,'VAT Reg. TIN: 000-786-571-001',0,1,C);
	$pdf -> Cell(1,0.1,'',0,1,L);
	$pdf -> SetFont('Times','B','12');
	$pdf -> Cell(3,0.3,'PARKING TICKET',0,0,L);
	$pdf -> SetTextColor(255,0,0);

	$sql1 = "SELECT * FROM or_tbl WHERE car_id = '$car_id' ";
	$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_array($result1);
		$or_id = $row1['or_id'];
		$or_date = $row1['or_date'];

	$sql = "SELECT * FROM car_tbl WHERE car_id = '$car_id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$car_id = $row['car_id'];
	$car_plate = $row['car_plate'];
	$vehicle_model = $row['vehicle_model'];
	$vehicle_timein = $row['vehicle_timein'];
	$vehicle_timeout = $row['vehicle_timeout'];
	$vehicle_location = $row['vehicle_location'];
	$vehicle_reason = $row['vehicle_reason'];
	$vehicle_flatrate = $row['vehicle_flatrate'];
	$vehicle_type = $row['vehicle_type'];
	$vehicle_hours = $row['vehicle_hours'];
	$vehicle_penalty = $row['vehicle_penalty'];
	$vehicle_total = $row['vehicle_total'];


	$sql2 = "SELECT * FROM rate_tbl WHERE vehicle_type = '$vehicle_type' ";
	$result2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_array($result2);
		$vehicle_hour = $row2['vehicle_hour'];

	$pdf -> Cell(1,0.3,"No. $or_id",0,1,L);
	$pdf -> SetFont('Times','B','10');
	$pdf -> SetTextColor(0,0,0);
	$pdf -> Cell(1,0.13,"Date: $or_date ",0,1,L);
	$pdf -> Cell(2.5,0.13,"Plate No. $car_plate",0,1,L);
	$pdf -> Cell(2.5,0.13,"Model: $vehicle_model",0,1,L);
	$pdf -> Cell(2.5,0.13,"Purpose: $vehicle_reason",0,1,L);

	$pdf -> SetFont('Times','B','12');
	$pdf -> Cell(1,0.3,'Billing Statement',0,1,L);

	$pdf -> SetFont('Times','B','10');
	$pdf -> Cell(2.5,0.13,"Flate Rate: P$vehicle_flatrate - $vehicle_hour Hours",0,1,L);

	if($vehicle_hour < $vehicle_hours + 1)
		{
			$pdf -> Cell(2.5,0.13,"Number of Hours of Stay: ".number_format($vehicle_hours,2)." Hours",0,1,L);
			$pdf -> Cell(2.5,0.13,"Succeding Hour: ".number_format($vehicle_hours - $vehicle_hour,2)." Hours",0,1,L);
			$pdf -> Cell(2.5,0.13,"Additional Pay: P".number_format($vehicle_penalty,2),0,1,L);
			$pdf -> Cell(1,0.13,"Total Amount:",0,0,L);
			$pdf -> SetTextColor(255,0,0);
			$pdf -> Cell(2.5,0.13," P".number_format($vehicle_total,2),0,1,L);
			$pdf -> SetTextColor(0,0,0);
		}
	else
		{
			$pdf -> Cell(2.5,0.13,"Number of Hours of Stay: ".number_format($vehicle_hours,2)." Hours",0,1,L);
			$pdf -> Cell(1,0.13,"Total Amount:",0,0,L);
			$pdf -> SetTextColor(255,0,0);
			$pdf -> Cell(2.5,0.13," P".number_format($vehicle_total,2),0,1,L);
			$pdf -> SetTextColor(0,0,0);		
		}

	$pdf -> Cell(1,0.1,'',0,1,L);
	$pdf -> Cell(1,0.1,'',0,1,L);
	$pdf -> SetFont('Times','','8');
	$pdf -> Cell(1.7,0.13,'1. Parking Fee',0,1,L);
	$pdf -> Cell(1.7,0.13,' a)P40.00 for the first 3 hours plus P10.00 for every succeeding hour for 4 and 6 wheeled vehicles',0,1,L);
	$pdf -> Cell(1.7,0.13,' b)P40.00 for 3 Hours for 2 and 3 wheeled vehicles',0,1,L);
	$pdf -> Cell(1.7,0.13,'2. Parking Hours 6.00AM to 9:00PM everyday including holidays',0,1,L);
	$pdf -> Cell(1.7,0.13,'3. Pay your parking fee at the designated cashier',0,1,L);
	$pdf -> Cell(1.7,0.13,'4. Present the payment receipt to the security guard upon exit',0,1,L);
	$pdf -> Cell(1.7,0.13,'5. Overnight parking is not allowed.',0,1,L);
	$pdf -> Cell(1.7,0.13,'    A parking fee of P500 per day will be charged to unauthorized overnight parking',0,1,L);

	$pdf -> Cell(1,0.1,'',0,1,L);
	$pdf -> SetFont('Times','B','12');
	$pdf -> Cell(0,0.3,'Terms and Conditions',0,1,C);

	$pdf -> SetFont('Times','','8');
	$pdf -> Cell(0,0.13,'1. This ticket entitles the customer to park one (1) vehicle in the parking areas inside the MCU',0,1,L);
	$pdf -> Cell(1.7,0.13,'    campus.',0,1,L);
	$pdf -> Cell(1.7,0.13,'2. This ticket is non-transferable.',0,1,L);
	$pdf -> Cell(1.7,0.13,'3. The customer will be charged P300.00 for a lost parking ticket in addition to the regular parking',0,1,L);
	$pdf -> Cell(1.7,0.13,'    charges. Related to this, the campus security records every vehicle that goes in and out of the',0,1,L);
	$pdf -> Cell(1.7,0.13,'    campus. Those who lose their tickets will be required to present sufficient proof of ownership',0,1,L);
	$pdf -> Cell(1.7,0.13,'    such as the certificate of registration, official recipt and legal identification cards.',0,1,L);
	$pdf -> Cell(1.7,0.13,'4. Use of parking space is subject to the parking and traffic rules of the Manila Central University.',0,1,L);
	$pdf -> Cell(1.7,0.13,'5. MCU shall not be responsible to any damage, loss of the vehicle, its accessories and other items.',0,1,L);
	$pdf -> Cell(1.7,0.13,'6. The Administration reserves the right to refuse the entry of any vehicle or person.',0,1,L);
	$pdf -> Cell(1.7,0.13,'7. The customer shall indemnity and shall keep indemnified MCU from any and all claims',0,1,L);
	$pdf -> Cell(1.7,0.13,'    demands, actions, suits, damages and cost whatsoever resulting from any death, injury to',0,1,L);
	$pdf -> Cell(1.7,0.13,'    person, loss or damage to any vehicle and property arising directly or indirectly from the',0,1,L);
	$pdf -> Cell(1.7,0.13,'    customers use or presence in the parking area.',0,1,L);
	$pdf -> Cell(1.7,0.13,'8. A vehicle left in the parking area for more than 24 hours without prior arrangement with',0,1,L);
	$pdf -> Cell(1.7,0.13,'    the Administration shall be reported to the proper authorities for appropriate action. any',0,1,L);
	$pdf -> Cell(1.7,0.13,'    expense in whatever action taken, such as towing, shall be charged to the owner.',0,1,L);

	$pdf -> Cell(1,0.1,'',0,1,L);
	$pdf -> SetFont('Arial','B','8');
	$pdf -> Cell(0,0.3,'*THIS DOCUMENT IS NOT VALID FOR CLAIMING INPUT TAXES*',0,1,C);
	$pdf -> Cell(0,0,'*THIS PARKING TICKET SHALL BE VALID FOR FIVE(5) YEARS FROM THE DATE OF ATP*',0,1,C);
	ob_end_clean();
	$pdf ->Output();

}
?>