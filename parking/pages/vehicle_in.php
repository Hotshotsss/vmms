<div class="col-lg-12">
    <center><h1 class="page-header">Vehicle In</h1></center>
</div>

<form method = "POST" action = "menu.php?webpage=vehicle_in">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel-body">
			      <label>Plate Number</label>
			      <input type = "text" class = "form-control" name = "txt-plate" placeholder="Enter Plate Number....." required>
			      <label>Time In</label>
			      <input type="text" class="form-control" name = "txt-time" value ="<?php echo $actual_time; ?>" readonly>
			      <label>Vehicle Model</label>
			      <input type = "text" class = "form-control" name = "txt-model" placeholder="Enter Model....." required>
			      <label>Purpose</label>
			      <textarea class = "form-control" name = "txt-purpose" placeholder="Enter Purpose....." required></textarea>
			      <label>Vehicle Type</label>      
			      <select class = "form-control" name = "txt-vehicletype">
			      	<?php
			      		$sql = "SELECT * FROM vehicle_tbl";
			      		$result = mysqli_query($conn,$sql);
			      		while($row = mysqli_fetch_array($result))
				      		{
				      			$vehicle_type = $row['vehicle_type'];
				      			echo "<option value = '$vehicle_type'>$vehicle_type</option>";
				      		}
			      	?>
			      </select>	<br>
			      <center><button type = "submit" name = "btn-in" class = "btn btn-primary">Save</button></center>
	    	</div>
	    </div>
	</div>
</form>


<?php
if(isset($_POST['btn-in']))
{
	$car_plate = $_POST['txt-plate'];
	$vehicle_type = $_POST['txt-vehicletype'];
	$vehicle_reason = $_POST['txt-purpose'];
	$vehicle_timein = $_POST['txt-time'];
	$vehicle_model = $_POST['txt-model'];

	$sql1 = "SELECT * FROM rate_tbl WHERE vehicle_type = '$vehicle_type' ";
	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_array($result1);
		$vehicle_rate = $row1['vehicle_rate'];

	$sql2 = "SELECT * FROM hour_tbl WHERE vehicle_type = '$vehicle_type' ";
	$result2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_array($result2); 
		$hour_rate = $row2['hour_rate'];


	$sql3 = "INSERT INTO car_tbl (car_id,car_plate,vehicle_model,vehicle_type,vehicle_flatrate,vehicle_flathour,vehicle_reason,vehicle_timein,payment_status) VALUES ('','$car_plate','$vehicle_model','$vehicle_type','$vehicle_rate','$hour_rate','$vehicle_reason','$vehicle_timein','Unpaid')";
	$result3 = mysqli_query($conn,$sql3);
	if($result3)
		{
			echo "<script>alert('Vehicle Saved!'); window.location.replace('menu.php?webpage=vehicle_in'); </script>";	
		}

}
?>