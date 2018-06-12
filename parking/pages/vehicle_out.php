
<div class="col-lg-12">
    <h1 class="page-header">Vehicle Out</h1>

   <div class="row">
			    <div class="col-lg-12">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			               <center><b>List of Vehicles</b></center>
			            </div>
			            <div class="panel-body">
			                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			                    <thead>
			                        <tr> 
			                        	<th>Plate Number</th>
			                            <th>Vehicle Model</th>
			                            <th>Time In</th>
			                            <th>Overnight?</th>
			                            <th>Action</th>
			                        </tr>
			                    </thead>

			                    <tbody>
			                    	<?php
			                    		$sql = "SELECT * FROM car_tbl WHERE payment_status = 'Unpaid' ";
			                    		$result = mysqli_query($conn,$sql);
			                    		while($row = mysqli_fetch_array($result))
			                    		{
			                    			$car_id = $row['car_id'];
			                    			$car_plate = $row['car_plate'];
			                    			$vehicle_model = $row['vehicle_model'];
			                    			$vehicle_timein = $row['vehicle_timein'];
			                    			$vehicle_timeout = $row['vehicle_timeout'];
			                    			echo "<tr>";
						                          echo "<td>".$car_plate."</td>";
						                          echo "<td>".$vehicle_model."</td>";
						                          echo "<td>".$vehicle_timein."</td>";
						                          echo "<td align = 'center'>";
						                          	echo "<input type = 'checkbox' class = 'form-control' name = 'txt-check' id='validation' value = 'Yes'>";
						                          echo "</td>";
						                          echo "<td align = 'center'>";
						                          	echo " <button class='btn btn-success' type='button' data-toggle='modal' data-target='#exitVehicle' onClick='exitVehicle();' name = 't2' id = 'car_id' value = '$car_id'><span class='glyphicon glyphicon-search'></span> View Details</button>";
						                          echo "</td>";
						                        echo "</tr>";
			                    		}
			                    	?>
			                    </tbody>          
			                </table>
			            </div>
			        </div>
			    </div>
		</div>
</div>

<div id="exitVehicle" class="modal fade">
  <div class = "modal-dialog">
      <div class = "modal-content">
            <form method="POST" action = "menu.php?webpage=vehicle_out" enctype="multipart/form-data">
		        <div class = "modal-header">
		          <h4 class="modal-title" id="myModalLabel">Details</h4>
		        </div>
		           <div class="modal-body">
		              <div class="form-group">
		              	 <div id ="d1" style="visibility: hidden;">Display</div>
		              </div>
		          </div>
		           <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            <button type="submit" name = "btn-update" class="btn btn-success" >Ok</button>
		          </div>
		       </form>
      </div>
  </div>
</div>

</div>
</form>
<script>
	function exitVehicle(){

		if(document.getElementById("validation").checked)
			{
	    	
	    	  xmlhttp = new XMLHttpRequest();
		      xmlhttp.open("GET","modal.php?vehicle_exit="+document.getElementById("car_id").value+"&&validation="+document.getElementById("validation").value,false);
		      xmlhttp.send(null);
		      document.getElementById("d1").innerHTML= xmlhttp.responseText;
		      document.getElementById("d1").style.visibility = 'visible';   	
			}
		else
			{
		      xmlhttp = new XMLHttpRequest();
		      xmlhttp.open("GET","modal.php?vehicle_exit="+document.getElementById("car_id").value+"&&validation=No",false);
		      xmlhttp.send(null);
		      document.getElementById("d1").innerHTML= xmlhttp.responseText;
		      document.getElementById("d1").style.visibility = 'visible';   	
			}
		}
</script>

<?php
if(isset($_POST['btn-update']))
{
	$car_id = $_SESSION['car_id'];
	$vehicle_timeout = $_SESSION['time_out'];
	$vehicle_hours = $_SESSION['vehicle_hours'];
	$vehicle_penalty = $_SESSION['vehicle_penalty'];
	$vehicle_total = $_SESSION['vehicle_total'];

	$sql = "UPDATE car_tbl SET vehicle_timeout = '$vehicle_timeout' , vehicle_hours = '$vehicle_hours', vehicle_penalty = '$vehicle_penalty', vehicle_total = '$vehicle_total', payment_status = 'Paid' WHERE car_id = '$car_id' ";
	$result = mysqli_query($conn,$sql);
	if($result)
		{
			$sql = "INSERT INTO or_tbl VALUES ('','$car_id','$vehicle_total','$actual_time')";
			$result = mysqli_query($conn,$sql);
			echo "<script>alert('Car has been saved!'); window.location.replace('printout.php?vehicle_out=$car_id');</script>";	
		}

}
?>

