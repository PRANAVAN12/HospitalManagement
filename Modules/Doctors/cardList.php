<?php
//including the database connection file
include_once("../Dbconfig/Config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM doctors ORDER BY id DESC"); // using mysqli_query instead
?>

<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/my-patients.html  30 Nov 2019 04:12:09 GMT -->
<head>
		<meta charset="utf-8">
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
	
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Our Doctors</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctors List</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
						
							
                        </div>
                        


                        <?php 
	
    while($res = mysqli_fetch_array($result)) { 	

				echo"		<div class='col-md-7 col-lg-8 col-xl-9'>";
                echo"        	<div class='row row-grid'>";
				echo"				<div class='col-md-6 col-lg-4 col-xl-3'>";
				echo"					<div class='card widget-profile pat-widget-profile'>";
				echo"						<div class='card-body>'";
				echo"							<div class='pro-widget-content'>";
				echo"								<div class='profile-info-widget'>";
				echo"									<a class='booking-doc-img'>";
				echo"										<img src='assets/img/patients/patient.jpg >";
				echo"									</a>";
				echo"									<div class='profile-det-info'>";
				echo"										<h3>ichard Wilson</a></h3>";
			
				echo"										<div class='patient-details'>";
				echo"											<h5><b>Patient ID :</b> P0016</h5>";
				echo"											<h5 class='mb-0'><i class='fas fa-map-marker-alt'></i> Alabama, USA</h5>";
				echo"										</div>";
				echo"									</div>";
				echo"								</div>";
				echo"							</div>";
				echo"							<div class='patient-info'>";
				echo"                                   <ul>";
				echo"									<li>Phone <span>+1 952 001 8563</span></li>";
				echo"									<li>Age <span>38 Years, Male</span></li>";
				echo"									<li>Blood Group <span>AB+</span></li>";
				echo"								</ul>";
				echo"							</div>";
				echo"						</div>";
				echo"					</div>";
				echo"				</div>";
								
							
								
					   echo" </div>";
					   echo" </div>";
					   echo" </div>";
     } ?>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
	
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>