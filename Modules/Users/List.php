<?php
//including the database connection file
include_once("../Dbconfig/Config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>
<html>
<head>

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
</head>
<body>

<?php include '../../View/headers/adminheader.html';?>
		<div class="container" style="margin-left: 20%; padding-top:5%">
			<h3 class="text-center">List of Users</h3>
			<hr>
			<div class="container text-left">

				<a href="add.php" class="btn btn-success">Add User</a>
			</div>
			
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
					
						   <th>FullName</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Password</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tbody>
				
				<?php 
	
		while($res = mysqli_fetch_array($result)) { 	
	echo "<tr>";
		echo "<td>".$res['fullname']."</td>";
		echo "<td>".$res['username']."</td>";
		echo "<td>".$res['email']."</td>";	
        echo "<td>".$res['mobile']."</td>";	
        echo "<td>".$res['age']."</td>";
		echo "<td>".$res['gender']."</td>";
		echo "<td>".$res['password']."</td>";	
	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
				</tbody>

			</table>
		</div>
	</div>
</body>
</html>
