<?php
//including the database connection file
include_once ("../../Dbconfig/Config.php");
session_start();


$user = $_SESSION['username'];
$result = mysqli_query($mysqli, "SELECT * FROM payments WHERE username = '$user'"); // using mysqli_query instead
?>
<html>
<head>

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
</head>
<body>

<?php include '../../../View/headers/userheader.html';?>
		<div class="container" style="margin-left: 20%; padding-top:5%">
			<h3 class="text-center">List of Payments</h3>
			<hr>
			
			
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
					
						
						   <th>Date</th>
						<th>Time</th>
                        <th>Username</th>
						<th>Total Amount</th>
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
			echo "<td>".$res['total']."</td>";
	
		echo "<td><a href=\"./payment.php?id=$res[id]\">Pay</a> </td>";		
	}
	?>
				</tbody>

			</table>
		</div>
	</div>
</body>
</html>
