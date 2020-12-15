<?php 
	session_start();

	// variable declaration

	$username="";
	$password="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'hospital');


// REGISTER USER
	if (isset($_POST['Submit'])) {
		// receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
		$password = mysqli_real_escape_string($db, $_POST['password1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password2']);


		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($mobile)) { array_push($errors, "Mobile is required"); }
    if (empty($age)) { array_push($errors, "Age is required"); }
		if (empty($gender)) { array_push($errors, "gender is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		if ($password != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		$sql_u = "SELECT * FROM users WHERE username='$username'";
		
		$res_u = mysqli_query($db, $sql_u);

		if (mysqli_num_rows($res_u) > 0) {
			$name_error = "Sorry... username already taken"; 	
		  }else if (count($errors) != 0){
			$email_error = "Sorry... Fill All Details"; 	
		  }else{
			$query = "INSERT INTO users(fullname,username,email,mobile,age,gender,password) VALUES('$fullname','$username','$email','$mobile','$age','$gender','$password')";
  			mysqli_query($db, $query);

 			 $_SESSION['success'] = "You are now logged in";
 				 header('location: View/Login.html');
		  }
	  }

?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
       
		

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">
		<style>
      .login-wrapper .loginbox .login-left {
    align-items: center;
    background: linear-gradient(180deg, #f8f9fa, #e2eaf1);
   
}


.form_error span {
	width: 80%;
	height: 35px;
	margin: 3px 10%;
	font-size: 1.1em;
	color: #D83D5A;
  }
  .form_error input {
	border: 1px solid #D83D5A;
  }
  .error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
  text-align: left;
  margin-bottom: 13px;
}
.error {
   

}
</style>
    </style>
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../assets/img/logo.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
							
								
	  <?php include('errors.php'); ?>
	  <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
								<!-- Form -->
								<form  method="post" action="register.php">
									<div class="form-group">
                
                    <input class="form-control" type="text" name="username" placeholder="Username">
                    <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
                  </div>

        
                  <div class="form-group">
										<input class="form-control" type="text" name="fullname" placeholder="FullName">
									</div>
									<div class="form-group">
										<input class="form-control" type="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
										<input class="form-control"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      type = "number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                  type = "number"  maxlength="10" name="mobile" placeholder="Mobile">
                  </div>
                  <div class="form-group">
										<input class="form-control" type="text" name="age" placeholder="Age">
                  </div>
                  <div class="form-group">
                   
                    <select  class="form-control" name="gender" placeholder="Gender" id="cars">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>


                    </select>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name="password1" placeholder="Password">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" name="password2" placeholder="Confirm Password">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" name="Submit" type="submit">Register</button>
									</div>
							</form>
								<!-- /Form -->
								
					
								
								
								<div class="text-center dont-have">Already have an account? <a href="View/Login1.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../assets/js/script.js"></script>
		
    </body>


</html>