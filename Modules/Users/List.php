<?php
//including the database connection file
include_once("../Dbconfig/Config.php");




error_reporting(0);
if(count($_POST)>0) {
$username=$_POST[username];
$result2 = mysqli_query($mysqli,"SELECT * FROM users where username='$username' ");
}
elseif (!count($_POST)>0) {
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
}

?>

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<!-- Bootstrap CSS -->
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css">	
				<!-- Fontawesome CSS -->
				<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">	
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="../assets/css/feathericon.min.css">	
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">		
		<!-- Main CSS -->
		<link rel="stylesheet" href="../assets/css/style.css">
			

		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">	
			<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">
<head>
<style>
.btn-primary {
    background-color: #09e5ab;
    border: 1px solid #09e5ab;
    margin-left: 3px;
}
.cont{
	margin-left:0px !important;
}
.page-wrapper {
    margin-left: 240px;
    padding-top: 9px;
    position: relative;
    transition: all 0.4s ease;
}</style>

        <style>
 


.btn-primary {
    background-color: #09e5ab;
    border: 1px solid #09e5ab;
    margin-left: 3px;
}
      </style>
    </head>
    <body>
	
	
<div>
		
		
	
				
<?php include '../../View/headers/newadmin.html';?>
        
					<!-- Page Wrapper -->
					<div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Patients</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="">Admin</a></li>
									<li class="breadcrumb-item active"><a href="List.php">Patients</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->





					<div class="container text-right">

					<a href="add.php" class="btn btn-success">Add User</a>
		</div>
		
		
		<div class="con">

		<form class="form-inline" method="post" action="List.php">
    <input type="text" name="username" class="form-control" placeholder="Search username ">
	<button type="submit" name="save" class="btn btn-primary">Search</button>
</form>			</div>
		<br>
	
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
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
		<?php	if($result2){

while($res = mysqli_fetch_array($result2)) { 
	echo "<tr>";
	echo "<td>".$res['fullname']."</td>";
		echo "<td>".$res['username']."</td>";
		echo "<td>".$res['email']."</td>";	
        echo "<td>".$res['mobile']."</td>";	
        echo "<td>".$res['age']."</td>";
		echo "<td>".$res['gender']."</td>";
		echo "<td>".$res['password']."</td>";	
	echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fe fe-pencil'></i>Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}

}
		elseif(!$result2){
		while($res = mysqli_fetch_array($result)) { 	
			echo "<tr>";
			echo "<td>".$res['fullname']."</td>";
			echo "<td>".$res['username']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td>".$res['mobile']."</td>";	
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['gender']."</td>";
			echo "<td>".$res['password']."</td>";	
	
		echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fe fe-pencil'></i>Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
		}
					?>	</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
			
			<!-- /Page Wrapper -->
		</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="../../View/home/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../../View/home/assets/js/popper.min.js"></script>
        <script src="../../View/home/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="../../View/home/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="../../View/home/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../../View/home/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="../../View/home/assets/js/script.js"></script>
		
    </body>

</html>