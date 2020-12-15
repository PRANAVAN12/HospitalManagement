
<?php
session_start();
	// variable declaration
	$_SESSION['username'] ="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'hospital');
//Login Admin
	if (isset($_POST['login_doctor'])) {
		$username = filter_input(INPUT_POST, 'username');
		$password = filter_input(INPUT_POST, 'password');
		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../../Appointment/doctor/List.php');
			}else {
				array_push($errors, "Wrong username/password combination");
				header('location: ./Login1.php');
			}
		}
    }
	?>
	
	<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>