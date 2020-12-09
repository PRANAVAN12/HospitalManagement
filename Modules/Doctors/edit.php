<?php
// including the database connection file
include_once("../Dbconfig/Config.php");

if(isset($_POST['update']))
{	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$fullname = mysqli_real_escape_string($mysqli, $_POST['fullname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
	$specialist = mysqli_real_escape_string($mysqli, $_POST['specialist']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);

	// checking empty fields
	if(empty($username) || empty($email) || empty($mobile) || empty($password)|| empty($fullname || empty($gender) || empty($specialist))) {
				
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($mobile)) {
			echo "<font color='red'>Mobile field is empty.</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		if(empty($fullname)) {
			echo "<font color='red'>Fullname field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		if(empty($specialist)) {
			echo "<font color='red'>Specialist field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE doctors SET fullname='$fullname',username='$username',email='$email',mobile='$mobile' ,specialist='$specialist',gender='$gender',password='$password' WHERE id=$id");
		
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
	$result = mysqli_query($mysqli, "SELECT * FROM doctors WHERE id=$id");
	
	while($res = mysqli_fetch_array($result))
	{
		$username = $res['username'];
		$email = $res['email'];
		$mobile = $res['mobile'];
		$password = $res['password'];
		$specialist = $res['specialist'];
		$gender = $res['gender'];
		$fullname = $res['fullname'];
	
	}

}
?>
<!DOCTYPE html>
<html>
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
				
            			Edit User
            	</h2>
				</caption>
				

				<fieldset class="form-group">
					<label> Full Name</label> <input type="text"
					class="form-control"
					value="<?php echo $fullname;?>"	name="fullname" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label> Username</label> <input type="text"
						 class="form-control"
						 value="<?php echo $username;?>"	name="username">
				</fieldset>

				<fieldset class="form-group">
					<label> Email</label> <input type="text"
					value="<?php echo $email;?>"	 class="form-control"
						name="email">
				</fieldset>
				<fieldset class="form-group">
					<label> Mobile</label> <input type="text"
					 class="form-control"
					 value="<?php echo $mobile;?>" 	name="mobile" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label> Specialist</label> <input type="text"
					value="<?php echo $specialist;?>" class="form-control"
						name="specialist">
				</fieldset>

				<fieldset class="form-group">
					<label> Gender</label> <input type="text"
					value="<?php echo $gender;?>" 	 class="form-control"
						name="gender">
				</fieldset>

				<fieldset class="form-group">
					<label> Password</label> <input type="text"
					value="<?php echo $password;?>" class="form-control"
						name="password">
				</fieldset>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<button type="submit" name="update" value="Update" class="btn btn-success">Update</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>