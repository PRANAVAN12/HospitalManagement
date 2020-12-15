<?php
// including the database connection file
include_once("../Dbconfig/Config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
		
			
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE payments SET username='$username',date='$date',time='$time' ,total='$total' WHERE id=$id");
		
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
	$result = mysqli_query($mysqli, "SELECT * FROM payments WHERE id=$id");
	
	while($res = mysqli_fetch_array($result))
	{
		$username = $res['username'];
		$date = $res['date'];
		$time = $res['time'];
		$total = $res['total'];
		
	
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
						<label> Total</label> <input type="text"
							 class="form-control"
							 value="<?php echo $total;?>"	name="total">
					</fieldset>
	
				
					<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
					<button type="submit" name="update"  class="btn btn-success">Save</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>