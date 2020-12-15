<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
       

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../../assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
        <![endif]-->
        
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

        </style>
    </head>
    <body>	 

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="../../assets/img/logo.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Welcome User</p>
								
                <!-- Form -->	<?php include('./login.php'); ?>
				
                <form action="./login.php"  method="post">
				<?php include('../errors.php'); ?>

									<div class="form-group">
										<input class="form-control" type="text" name="username"  placeholder="Username">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="login_user" value="login_user" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
						
								
						
								
								<div class="text-center dont-have">Don’t have an account? <a href="../register.php">Register</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../../assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>