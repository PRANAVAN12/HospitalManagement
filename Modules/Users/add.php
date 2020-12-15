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
	$fullname = mysqli_real_escape_string($mysqli, $_POST['fullname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);

	// checking empty fields
	if(empty($username) || empty($email) || empty($mobile) || empty($password)|| empty($fullname || empty($gender) || empty($age))) {
				
		if(empty($username)) {
			echo "<font color='red'>UserName field is empty.</font><br/>";
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
			echo "<font color='red'>FullName field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(fullname,username,email,mobile,age,gender,password) VALUES('$fullname','$username','$email','$mobile','$age','$gender','$password')");
		
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
				
            			Add User
            	</h2>
				</caption>
				

				<fieldset class="form-group">
					<label> Full Name</label> <input type="text"
					class="form-control"
						name="fullname" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label> Username</label> <input type="text"
						 class="form-control"
						name="username">
				</fieldset>

				<fieldset class="form-group">
					<label> Email</label> <input type="text"
						 class="form-control"
						name="email">
				</fieldset>
				<fieldset class="form-group">
					<label> Mobile</label> <input type="text"
					 class="form-control"
						name="mobile" required="required">
				</fieldset>

				<fieldset class="form-group">
					<label> Age</label> <input type="text"
						 class="form-control"
						name="age">
				</fieldset>

				<fieldset class="form-group">
					<label> Gender</label> <input type="text"
						 class="form-control"
						name="gender">
				</fieldset>

				<fieldset class="form-group">
					<label> Password</label> <input type="text"
						 class="form-control"
						name="password">
				</fieldset>
				<button type="submit" name="Submit" class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>