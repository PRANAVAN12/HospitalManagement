<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../Dbconfig/Config.php");

if(isset($_POST['Submit'])) {	
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);
	$total = mysqli_real_escape_string($mysqli, $_POST['total']);


	// checking empty fields
	if(empty($username) || empty($date) || empty($time) || empty($total) ) {
				
					
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		
		if(empty($total)) {
			echo "<font color='red'>Total Amount field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		


		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO payments(username,date,time,total) VALUES('$username','$date','$time','$total')");
		
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
	
<?php
//getting id from url
if(sizeof($_GET)!=0){
	$id = $_GET['id'];
	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT * FROM prescription WHERE id=$id");
	
	while($res = mysqli_fetch_array($result))
	{
		$username = $res['username'];
		$date = $res['date'];
		$time = $res['time'];
	
		
	
	}

}
?>
	<body>
	<?php include '../../View/headers/adminheader.html';?>
			<div class="container" style="margin-left: 20%; padding-top:5%">
			<div class="card">
				<div class="card-body">
				<form class="form-detail" name="form1" method="post" action="add.php">
					<caption>
						<h2>
					
							Add Payments
					</h2>
					</caption>
					<fieldset class="form-group">
						<label> Username</label> <input type="text"
						value="<?php echo $username;?>"		 class="form-control"
							name="username">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Date</label> <input type="text"
						value="<?php echo $date;?>"		 class="form-control"
							name="date">
					</fieldset>
					<fieldset class="form-group">
						<label> Time</label> <input type="text"
						 class="form-control"
						 value="<?php echo $time;?>"			name="time" required="required">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Total</label> <input type="text"
							 class="form-control"
							name="total">
					</fieldset>
	
					
					<button type="submit" name="Submit" class="btn btn-success">Save</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>