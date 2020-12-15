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
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


		<style>

body {
  
    background-color: #607D8B;
}
.card {

    border: 1px solid rgba(0,0,0,.125);
    border-radius: .55rem;
    margin-right: 32%;
    margin-left: 18%;
    border: 4px solid #f0f0f0;
    margin-bottom: 1.875rem;
}
		</style>
	</head>
	<body>

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
						id="datepicker" readonly 	 class="form-control"
							name="date">
					</fieldset>
					<fieldset class="form-group">
						<label> Time</label> <input type="text"
						 class="form-control" id="timepicker" readonly
							name="time" required="required">
					</fieldset>
	
					

					<select class="form-control" name="doctor">
    <option value="">Doctors</option>
    <?php
 $doctor = mysqli_query($mysqli,"SELECT * FROM doctors");
 while($m_row = mysqli_fetch_array($doctor))        
        echo("<option value = '" . $m_row['username'] . "'>" ."Dr. ". $m_row['username'] . "</option>");
    ?>
</select>

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
	<script>
     $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });

        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap'
        });
    </script>