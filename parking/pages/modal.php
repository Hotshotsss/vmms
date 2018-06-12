<?php
include('dbconnection.php');
session_start();
ob_start();

if(isset($_REQUEST['location_update']))
	{
		$car_id = $_REQUEST['location_update'];
		$_SESSION['car_id'] = $car_id;	

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

		echo "<b><center>Plate No.</center></b>";
		echo "<center><font color = 'red' size = '12pt'><b>$car_plate</b></font></center>";	

		echo "<b>Vehicle Details</b><br>";
		echo "<b>Vehicle Model:</b >$vehicle_model<br>";
		echo "<b>Purpose:</b> $vehicle_reason<br><br>";

		echo "<b>Time</b><br>";
		echo "<b>Time In:</b> $vehicle_timein<br>";
		echo "<b>Time Out:</b> $vehicle_timeout<br>";
		echo "<b>Location:</b> $vehicle_location<br><br>";

		echo "<label>Change Location</label>";
		echo "<select name = 'txt-location' class = 'form-control'>";
			$sql2 = "SELECT * FROM parking_tbl";
			$result2 = mysqli_query($conn,$sql2);
			while($row2 = mysqli_fetch_array($result2))
				{	
					$parking_name = $row2['parking_name'];
					echo "<option value = '$parking_name'>$parking_name</option>";	
				}
		echo "</select>";
	}

if(isset($_REQUEST['vehicle_exit']))
	{
		$car_id = $_REQUEST['vehicle_exit'];
		$validation = $_REQUEST['validation'];
		$_SESSION['car_id'] = $car_id;	
		$date = date_create();
		$actual_time = date_format($date, 'Y-m-d h:i:s A');
		$sql = "SELECT * FROM car_tbl WHERE car_id = '$car_id' AND payment_status = 'Unpaid' ";
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
		$vehicle_flathour = $row['vehicle_flathour'];


		$sql2 = "SELECT * FROM rate_tbl WHERE vehicle_type = '$vehicle_type' ";
		$result2 = mysqli_query($conn,$sql2);
		$row2 = mysqli_fetch_array($result2);
			$vehicle_hour = $row2['vehicle_hour'];

		echo "<b><center>Plate No.</center></b>";
		echo "<center><font color = 'red' size = '12pt'><b>$car_plate</b></font></center>";	

		echo "<center><b>Vehicle Details</b></center><br>";
		echo "<b>Vehicle Model:</b >$vehicle_model<br>";
		echo "<b>Purpose:</b> $vehicle_reason<br><br>";

		$then = strtotime($vehicle_timein);
		$now = 	strtotime($actual_time);
		$difference = $now - $then;
		$minutes = floor($difference/60)/60;

		echo "<center><b>Time</b></center><br>";
		echo "<b>Time In:</b> $vehicle_timein<br>";
		echo "<b>Time Out:</b> $actual_time<br>";
		echo "<b>Location:</b> $vehicle_location<br><br>";


		
		if($validation == "Yes")
			{
				/*if($minutes > ($vehicle_hour + 1))
					{
						$succeding = $minutes - $vehicle_hour;
						echo "<b>Succeding Hours:</b> ".number_format($succeding,2)." Hours<br>";
						echo "<br><b>Total:</b> P".number_format($total = $vehicle_flatrate - 25.00,2);

						$_SESSION['time_out'] = $actual_time;
						$_SESSION['vehicle_hours'] = $minutes;
						$_SESSION['vehicle_penalty'] = $additional;
						$_SESSION['vehicle_total'] = $additional+$vehicle_flatrate;
					}*/
				echo "<center><b>Total Amount</b></center>";
				echo "<b>Flate Rate:</b> P".number_format($vehicle_flatrate - 15,2)." - $vehicle_hour Hours"."<br>";
				echo "<b>Number of hours stay: </b>".number_format($minutes,2)." Hours<br>";

						if(($minutes/24) >= 2)
						{
							echo "<b>Succeding Days:</b> ".number_format($total_days = $minutes/24,2)." Days<br>";	
							echo "<b>Additional Pay:</b> P".number_format($additional =25,2)."<br>";	
							echo "<b>Total:</b> P".number_format(($total_flatrate =  $vehicle_flatrate - 15 + 25) ,2);

							$_SESSION['time_out'] = $actual_time;
							$_SESSION['vehicle_hours'] = $total_days;
							$_SESSION['vehicle_penalty'] = $additional;
							$_SESSION['vehicle_total'] = $total_flatrate;

						}
						else
						{
							echo "<b>Succeding Days:</b> ".number_format(0,2)." Days<br>";	
							echo "<b>Total:</b> P".number_format(($total_flatrate = $vehicle_flatrate - 15) ,2);
							$_SESSION['time_out'] = $actual_time;
							$_SESSION['vehicle_hours'] = 0;
							$_SESSION['vehicle_penalty'] = 0;
							$_SESSION['vehicle_total'] = $total_flatrate;
						}				
			}

			else
				{
					echo "<center><b>Total Amount</b></center>";
					echo "<b>Flate Rate:</b> P".number_format($vehicle_flatrate,2)." - $vehicle_hour Hours"."<br>";
					echo "<b>Number of hours stay: </b>".number_format($minutes,2)." Hours<br>";

					if($minutes > ($vehicle_hour + 1))
						{
							$succeding = $minutes - $vehicle_hour;
							echo "<b>Succeding Hours:</b> ".number_format($succeding,2)." Hours<br>";
							echo "<b>Additional: </b>P".number_format($additional = $succeding * $vehicle_flathour,2) ;
							echo "<br><b>Total:</b> P".number_format($total = $additional + $vehicle_flatrate,2);
							$_SESSION['time_out'] = $actual_time;
							$_SESSION['vehicle_hours'] = $minutes;
							$_SESSION['vehicle_penalty'] = $additional;
							$_SESSION['vehicle_total'] = $total;
						}
				}

		




	}

?>