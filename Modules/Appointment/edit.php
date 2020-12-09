<?php
// including the database connection file
include_once("../Dbconfig/Config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
		
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE appointment SET username='$username',date='$date',mobile='$mobile' ,time='$time',reason='$reason',doctor='$doctor' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: List.php");
		}
}
?>



<?php
//getting id from url
if(sizeof($_GET)!=0){
	$id = $_GET['id'];
	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM appointment WHERE id=$id");
	
	while($res = mysqli_fetch_array($result))
	{
		$username = $res['username'];
		$doctor = $res['doctor'];
		$mobile = $res['mobile'];
		$date = $res['date'];
		$time = $res['time'];
		$reason = $res['reason'];
		
	
	}

}
?>
<!DOCTYPE html>
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
				<form class="form-detail" name="form1" method="post" action="edit.php">
					<caption>
						<h2>
					
							Edit Prescription
					</h2>
					</caption>
					<fieldset class="form-group">
						<label> Username</label> <input type="text"
							 class="form-control"
							 value="<?php echo $username;?>"	name="username">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Date</label> <input type="text"
						value="<?php echo $date;?>"	 class="form-control"
							name="date">
					</fieldset>
					<fieldset class="form-group">
						<label> Time</label> <input type="text"
						 class="form-control"
						 value="<?php echo $time;?>"	name="time" required="required">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Doctor</label> <input type="text"
							 class="form-control"
							 value="<?php echo $doctor;?>"	name="doctor">
					</fieldset>
					<fieldset class="form-group">
						<label> Contact No</label> <input type="text"
							 class="form-control"
							 value="<?php echo $mobile;?>"	name="mobile">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Reason</label> <input type="text"
						value="<?php echo $reason;?>" 	 class="form-control"
							name="reason">
					</fieldset>
					<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
					<button type="submit" name="update"  class="btn btn-success">Save</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>