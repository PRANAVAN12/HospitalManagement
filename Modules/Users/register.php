<!-- <?php 
	// session_start();

	// variable declaration
	// $UserName = "";
	// $Email    = "";
	// $Mobile    = "";
	// $password_1="";
	
	// $errors = array(); 
	// $_SESSION['success'] = "";

	// connect to database
	// $db = mysqli_connect('localhost', 'root', '', 'hospital');

	// REGISTER USER
	// if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		// $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
		// $Email = mysqli_real_escape_string($db, $_POST['Email']);
		// $Mobile = mysqli_real_escape_string($db, $_POST['Mobile']);
	

		
		// $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		// $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


		// form validation: ensure that the form is correctly filled
		// if (empty($UserName)) { array_push($errors, "Username is required"); }
		// if (empty($Email)) { array_push($errors, "Email is required"); }
		// if (empty($Mobile)) { array_push($errors, "Mobile is required"); }
		
		// if (empty($password_1)) { array_push($errors, "Password is required"); }

		// if ($password_1 != $password_2) {
		// 	array_push($errors, "The two passwords do not match");
		// }

		// $sql_u = "SELECT * FROM users WHERE UserName='$UserName'";
		
		// $res_u = mysqli_query($db, $sql_u);

		// if (mysqli_num_rows($res_u) > 0) {
		// 	$name_error = "Sorry... username already taken"; 	
		//   }else if (count($errors) != 0){
		// 	$email_error = "Sorry... Fill All Details"; 	
		//   }else{
		// 	$query = "INSERT INTO users (UserName,Email,Mobile, password) 
		// 	VALUES('$UserName', '$Email', '$Mobile', '$password_1')";
  		// 	mysqli_query($db, $query);

 		// 	 $_SESSION['UserName'] = $UserName;
 		// 	 $_SESSION['success'] = "You are now logged in";
 		// 		 header('location: View/login.php');
		//   }
	  } -->

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<style>@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,500);
body,
html {
  margin: 0;
  height: 100%;
}

input {
  border: none;
}

button:focus {
  outline: none;
}

::-webkit-input-placeholder {
  color: rgba(255, 255, 255, 0.65);
}

::-webkit-input-placeholder .input-line:focus +::input-placeholder {
  color: #fff;
}

.highlight {
  color: rgba(255, 255, 255, 0.8);
  font-weight: 400;
  cursor: pointer;
  transition: color .2s ease;
}

.highlight:hover {
  color: #fff;
  transition: color .2s ease;
}

.spacing {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  height: 120px;
  font-weight: 300;
  text-align: center;
  margin-top: 10px;
  color: rgba(255, 255, 255, 0.65)
}

.input-line:focus {
  outline: none;
  border-color: #fff;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}

.ghost-round {
  cursor: pointer;
  background: none;
  border: 1px solid rgba(255, 255, 255, 0.65);
  border-radius: 25px;
  color: rgba(255, 255, 255, 0.65);
  -webkit-align-self: flex-end;
  -ms-flex-item-align: end;
  align-self: flex-end;
  font-size: 19px;
  font-size: 1.2rem;
  font-family: roboto;
  font-weight: 300;
  line-height: 2.5em;
  margin-top: auto;
  margin-bottom: 25px;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}

.ghost-round:hover {
  background: rgba(255, 255, 255, 0.15);
  color: #fff;
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}

.input-line {
  background: none;
  margin-bottom: 10px;
  line-height: 2.4em;
  color: #fff;
  font-family: roboto;
  font-weight: 300;
  letter-spacing: 0px;
  letter-spacing: 0.02rem;
  font-size: 19px;
  font-size: 1.2rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.65);
  -webkit-transition: all .2s ease;
  transition: all .2s ease;
}

.full-width {
  width: 100%;
}

.input-fields {
  margin-top: 25px;
}

.container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  background: #eee;
  height: 100%;
}

.content {
  padding-left: 25px;
  padding-right: 25px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: column;
  -ms-flex-flow: column;
  flex-flow: column;
  z-index: 5;
}

.welcome {
  font-weight: 200;
  margin-top: 75px;
  text-align: center;
  font-size: 40px;
  font-size: 2.5rem;
  letter-spacing: 0px;
  letter-spacing: 0.05rem;
}

.subtitle {
  text-align: center;
  line-height: 1em;
  font-weight: 100;
  letter-spacing: 0px;
  letter-spacing: 0.02rem;
}

.menu {
  background: rgba(0, 0, 0, 0.2);
  width: 100%;
  height: 50px;
}

.window {
  z-index: 100;
  color: #fff;
  font-family: roboto;
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: column;
  -ms-flex-flow: column;
  flex-flow: column;
  box-shadow: 0px 15px 50px 10px rgba(0, 0, 0, 0.2);
  box-sizing: border-box;
  height: 560px;
  width: 360px;
  background: #fff;
  background: url('https://pexels.imgix.net/photos/27718/pexels-photo-27718.jpg?fit=crop&w=1280&h=823') top left no-repeat;
}

.overlay {
  background: -webkit-linear-gradient(#8CA6DB, #B993D6);
  background: linear-gradient(#8CA6DB, #B993D6);
  opacity: 0.85;
  filter: alpha(opacity=85);
  height: 560px;
  position: absolute;
  width: 360px;
  z-index: 1;
}

.bold-line {
  background: #e7e7e7;
  position: absolute;
  top: 0px;
  bottom: 0px;
  margin: auto;
  width: 100%;
  height: 360px;
  z-index: 1;
  opacity:0.1;
    background: url('https://pexels.imgix.net/photos/27718/pexels-photo-27718.jpg?fit=crop&w=1280&h=823') left no-repeat;
  background-size:cover;
}

@media (max-width: 500px) {
  .window {
    width: 100%;
    height: 100%;
  }
  .overlay {
    width: 100%;
    height: 100%;
  }
}</style>
</head>
<body>
<div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Hello !</div>
    
      <div class='input-fields'>
        <input type='text' placeholder='Username' class='input-line full-width'></input>
        <input type='email' placeholder='Email' class='input-line full-width'></input>
        <input type='password' placeholder='Password' class='input-line full-width'></input>

      </div>
 
      <div><button class='ghost-round full-width'>Create Account</button></div>
    </div>
  </div>
</div>
</body>
</html>