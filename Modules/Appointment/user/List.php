<?php
//including the database connection file
include_once ("../../Dbconfig/Config.php");
session_start();


$user = $_SESSION['username'];
$result = mysqli_query($mysqli, "SELECT * FROM appointment WHERE username = '$user'"); // using mysqli_query instead
?>


<html>
<head>

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
	<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
</head>
<body>
<a href="../../"></a>
<?php include '../../../View/headers/userheader.html';?>
		<div class="container" style="margin-left: 20%; padding-top:5%">
			<h3 class="text-center">List of Appointments</h3>
			<hr>
			<div class="container text-left">

				<a href="add.php" class="btn btn-success" >Add Appointment</a>
			</div>
			
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
				<i class="fa fa-trash" aria-hidden="true">
				<?php 
	
		while($res = mysqli_fetch_array($result)) { 	
			echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['time']."</td>";
			echo "<td>".$res['username']."</td>";	
			echo "<td>".$res['mobile']."</td>";	
			echo "<td>".$res['doctor']."</td>";
			echo "<td>".$res['reason']."</td>";
		echo "<td> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"></i></a></td>";		
	}
	?>
				</tbody>

			</table>
		</div>
	</div>
</body>
</html>
