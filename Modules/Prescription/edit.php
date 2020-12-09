<?php
// including the database connection file
include_once("../Dbconfig/Config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);
	$medicines = mysqli_real_escape_string($mysqli, $_POST['medicines']);
	$note = mysqli_real_escape_string($mysqli, $_POST['note']);


	// checking empty fields
	if(empty($username) || empty($date) || empty($time) || empty($medicines)|| empty($note) ) {
				
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
		
			
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE prescription SET username='$username',date='$date',time='$time' ,medicines='$medicines',note='$note' WHERE id=$id");
		
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
	$result = mysqli_query($mysqli, "SELECT * FROM prescription WHERE id=$id");
	
	while($res = mysqli_fetch_array($result))
	{
		$username = $res['username'];
		$date = $res['date'];
		$time = $res['time'];
		$medicines = $res['medicines'];
		$note = $res['note'];
		
	
	}

}
?>

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
						<label> Medicines</label> <input type="text"
							 class="form-control"
							 value="<?php echo $medicines;?>"	name="medicines">
					</fieldset>
	
					<fieldset class="form-group">
						<label> Note</label> <input type="text"
						value="<?php echo $note;?>" 	 class="form-control"
							name="note">
					</fieldset>
					<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
					<button type="submit" name="update"  class="btn btn-success">Save</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>