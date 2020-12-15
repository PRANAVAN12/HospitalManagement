<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../../Dbconfig/Config.php");

if(isset($_POST['Submit'])) {	
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);
	$medicines = mysqli_real_escape_string($mysqli, $_POST['medicines']);
	$note = mysqli_real_escape_string($mysqli, $_POST['note']);
	$doctor = mysqli_real_escape_string($mysqli, $_POST['doctor']);

	// checking empty fields
	if(empty($username) || empty($date) || empty($time) || empty($medicines)|| empty($note) ||  empty($doctor)) {
				
		if(empty($username)) {
			echo "<font color='red'>User Name field is empty.</font><br/>";
		}
		
		if(empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		
		if(empty($medicines)) {
			echo "<font color='red'>Medicines field is empty.</font><br/>";
		}
		
		if(empty($note)) {
			echo "<font color='red'>Note field is empty.</font><br/>";
		}
		if(empty($doctor)) {
			echo "<font color='red'>Note field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
	


		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO prescription(username,date,time,medicines,note,doctor) VALUES('$username','$date','$time','$medicines','$note','$doctor')");
		
			//redirectig to the display page. In our case, it is index.php
			header("Location: List.php");
	}
}
?>
</body>
</html>

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
	
		$date = $res['date'];
		$time = $res['time'];
		
		
	
	}

}
?>
<html>
	<head>
	
	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		
		crossorigin="anonymous">
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
					
							Add Prescription
					</h2>
					</caption>
					<fieldset class="form-group">
						<label> Username</label> <input type="text"
                        value="<?php echo $username;?>"	 class="form-control"
							name="username">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Date</label> <input type="text"
                        value="<?php echo $date;?>" class="form-control"
							name="date">
					</fieldset>
					<fieldset class="form-group">
						<label> Time</label> <input type="text"
						 class="form-control"
						 value="<?php echo $time;?>"	name="time" required="required">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Medicines</label> <input type="text"
							 class="form-control"
							name="medicines">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Note</label> <input type="text"
							 class="form-control"
							name="note">
                    </fieldset>
                    
                    <fieldset class="form-group">
						<label> Doctor</label> <input type="text"
							 class="form-control"
                             value="<?php echo $doctor;?>"	name="doctor">
					</fieldset>
					<button type="submit" name="Submit" class="btn btn-success">Save</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>