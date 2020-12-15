<?php
//including the database connection file
include_once("../Dbconfig/Config.php");




error_reporting(0);
if(count($_POST)>0) {
$username=$_POST[username];
$result2 = mysqli_query($mysqli,"SELECT * FROM payments where username='$username' ");
}
elseif (!count($_POST)>0) {
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM payments ORDER BY id DESC"); // using mysqli_query instead
}

?>

<style>
.btn-primary {
    background-color: #09e5ab;
    border: 1px solid #09e5ab;
    margin-left: 3px;
}
.page-wrapper {
    margin-left: 240px;
    padding-top: 9px !important;
    position: relative;
    transition: all 0.4s ease;
}
.cont{
	margin-left:0px !important;
}

.status{
	
    background-color: red;
    padding: 0px 7px;
    color: white;
    height: 9px;
    border-radius: 11px;
}
.status1{
	
    background-color: green;
    padding: 0px 7px;
    color: white;
    height: 9px;
    border-radius: 11px;
}
</style>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Patient List Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="../assets/css/feathericon.min.css">
			<!-- Datatables CSS -->
		<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
	
		<!-- Main CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">

    </head>
		
	
			
    <?php include '../../View/headers/newadmin.html';?>
        
				
					


			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Payments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Admin</a></li>
									<li class="breadcrumb-item active" ><a href="List.php">Payment</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="cont">

<form class="form-inline" method="post" action="List.php">
<input type="text" name="username" class="form-control" placeholder="Search  Patient ">
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
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>User</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tbody>
		<?php	if($result2){

while($res = mysqli_fetch_array($result2)) { 
	echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['time']."</td>";
			echo "<td>".$res['username']."</td>";	
			echo "<td>".$res['total']."</td>";
			if ($res['status']=="UnPaid"){
				echo "<td>"."<span class='status'>".$res['status']."</span>"."</td>";
			  }
			  else {
				echo "<td>"."<span class='status1' >".$res['status']."</span>"."</td>";
			  }
			
	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}

}
		elseif(!$result2){
		while($res = mysqli_fetch_array($result)) { 	
			echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['time']."</td>";
			echo "<td>".$res['username']."</td>";	
			echo "<td>".$res['total']."</td>";
			if ($res['status']=="UnPaid"){
				echo "<td>"."<span class='status'>".$res['status']."</span>"."</td>";
			  }
			  else {
				echo "<td>"."<span class='status1' >".$res['status']."</span>"."</td>";
			  }
			
	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
		}  ?>
									
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->

				<!-- jQuery -->
				<script src="../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	
		<!-- Custom JS -->
		<script  src="../assets/js/script.js"></script>