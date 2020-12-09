<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../Dbconfig/Config.php");

if(isset($_POST['Submit'])) {	
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
	$doctor = mysqli_real_escape_string($mysqli, $_POST['doctor']);
	$reason = mysqli_real_escape_string($mysqli, $_POST['reason']);


	// checking empty fields
	if(empty($date) || empty($time) || empty($mobile) || empty($username) || empty($reason) || empty($doctor)) {
				
		if(empty($date)) {
			echo "<font color='red'>Appointment Date field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($mobile)) {
			echo "<font color='red'>Mobile field is empty.</font><br/>";
		}
	
		if(empty($time)) {
			echo "<font color='red'>Appointment Time field is empty.</font><br/>";
		}
		
		if(empty($reason)) {
			echo "<font color='red'>Reason field is empty.</font><br/>";
		}
		if(empty($doctor)) {
			echo "<font color='red'>Appointment Doctor field is empty.</font><br/>";
		}
		
		//link to the previous pdoctor
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO appointment(time,date,username,mobile,doctor,reason) VALUES('$time','$date','$username','$mobile','$doctor','$reason')");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: List.php");
	}
}
?>
</body>
</html>



<html>
	<head>
	
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		
		crossorigin="anonymous">
	</head>
	<body>
	<?php include '../../View/headers/adminheader.html';?>
			<div class="container" style="margin-left: 20%; padding-top:5%">
			<div class="card">
				<div class="card-body">
				<form class="form-detail" name="form1" method="post" action="add.php">
					<caption>
						<h2>
					
							Add Appointment
					</h2>
					</caption>
					<fieldset class="form-group">
						<label> Username</label> <input type="text"
							 class="form-control"
							name="username">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Date</label> <input type="text"
							 class="form-control"
							name="date">
					</fieldset>
					<fieldset class="form-group">
						<label> Time</label> <input type="text"
						 class="form-control"
							name="time" required="required">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Doctor</label> <input type="text"
							 class="form-control"
							name="doctor">
					</fieldset>
					<fieldset class="form-group">
						<label> Contact Num</label> <input type="text"
							 class="form-control"
							name="mobile">
					</fieldset>
	
					<fieldset class="form-group">
						<label> reason</label> <input type="text"
							 class="form-control"
							name="reason">
					</fieldset>
					<button type="submit" name="Submit" class="btn btn-success">Save</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>