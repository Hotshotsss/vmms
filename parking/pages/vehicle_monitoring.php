<div class="col-lg-12">
    <h1 class="page-header">Car Monitoring</h1>

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
			                    			echo "<tr>";
						                          echo "<td>".$car_plate."</td>";
						                          echo "<td>".$vehicle_model."</td>";
						                          echo "<td>".$vehicle_timein."</td>";
						                          echo "<td align = 'center'>";
						                          	echo " <button class='btn btn-success' type='button' data-toggle='modal' data-target='#updateLocation' onClick='updateLocation(this);' name = 't2' id = '$car_id' value = '$car_id'><span class='glyphicon glyphicon-search'></span> View Details</button>";
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

<div id="updateLocation" class="modal fade">
  <div class = "modal-dialog">
      <div class = "modal-content">
            <form method="POST" action = "menu.php?webpage=vehicle_monitoring" enctype="multipart/form-data">
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

<script>
	function updateLocation(elem){
	      var id =elem.id;
	      xmlhttp = new XMLHttpRequest();
	      xmlhttp.open("GET","modal.php?location_update="+document.getElementById(id).value,false);
	      xmlhttp.send(null);
	      document.getElementById("d1").innerHTML= xmlhttp.responseText;
	      document.getElementById("d1").style.visibility = 'visible';   
	}
</script>



<?php
if(isset($_POST['btn-update']))
{
	$car_id = $_SESSION['car_id'];
	$vehicle_location = $_POST['txt-location'];
	$sql = "UPDATE car_tbl SET vehicle_location = '$vehicle_location' WHERE car_id = '$car_id' ";
	$result = mysqli_query($conn,$sql);
		if($result)
		{
			echo "<script>alert('Location Saved!'); window.location.replace('menu.php?webpage=vehicle_monitoring'); </script>";	
		}
}

?>