<?php
//including the database connection file
include_once("../../Dbconfig/Config.php");

session_start();


$user = $_SESSION['username'];

$result = mysqli_query($mysqli, "SELECT * FROM appointment WHERE doctor = '$user'"); // using mysqli_query instead
?>

<html>
<head>

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
</head>
<body>
<a href="../"></a>
<?php include '../../../View/headers/doctorheader.html';?>
		<div class="container" style="margin-left: 20%; padding-top:5%">
			<h3 class="text-center">List of Appointments</h3>
			<hr>
			
			
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
					
						
						   <th>Date</th>
						<th>Time</th>
                        <th>Username</th>
                        <th>Mobile</th>		
						<th>Doctor</th>
						<th>Reason</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tbody>
				
				<?php 
	
		while($res = mysqli_fetch_array($result)) { 	
			echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['time']."</td>";
			echo "<td>".$res['username']."</td>";	
			echo "<td>".$res['mobile']."</td>";	
			echo "<td>".$res['doctor']."</td>";
			echo "<td>".$res['reason']."</td>";
		echo "<td><a href=\"../../Prescription/doctor/add.php?id=$res[id]\">Add Prescription</a> </td>";		
	}
	?>
				</tbody>

			</table>
		</div>
	</div>
</body>
</html>
