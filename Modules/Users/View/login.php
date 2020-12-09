<?php 
	session_start();
	// variable declaration
	$username="";
	$password="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'hospital');
	echo"hiiiiii               ";
	echo isset($_POST['login_user']);
	// LOGIN USER
	if (isset($_POST['login_user'])) {
	
		$username = filter_input(INPUT_POST, 'username');
		$password = filter_input(INPUT_POST, 'password');
echo $username;
		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			echo"hiii";
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$user=mysqli_fetch_assoc($results);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['UserId']=$user['id'];
				$_SESSION['success'] = "You are now logged in";

				echo $_SESSION['success'];
				header('location: ../../Appointment/user/List.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}	
	
	}

	
	
?>