
  <?php


// including the database connection file
include_once("../../Dbconfig/Config.php");


session_start();

$user = $_SESSION['username'];


?>

<head><link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <?php include '../../../View/headers/userheader.html';?>

    <style>.grey-bg {  
        background-color: #F5F7FA;
    }
    body {
    margin: 0px;
    padding-left: 262px;
    padding-bottom:100px;
  
}
    
    </style>
    </head>
  
    <div class="grey-bg container-fluid">
      <section id="minimal-statistics">
        <div class="row">
          <div class="col-12 mt-3 mb-1">
          
          </div>
        </div>
        <div class="row">
        <?php
//getting id from url
	//selecting data associated with this particular id
	$result = mysqli_query($mysqli, "SELECT COUNT(*) AS total
  FROM prescription WHERE username='$user' ;" );
$data=mysqli_fetch_assoc($result);
// echo $data['total'];
$result1 = mysqli_query($mysqli, "SELECT COUNT(*) AS payment
FROM payments WHERE username='$user' ;" );
$data1=mysqli_fetch_assoc($result1);

$result2 = mysqli_query($mysqli, "SELECT COUNT(*) AS appointment
FROM appointment WHERE username='$user' ;" );
$data2=mysqli_fetch_assoc($result2);
  
$result3 = mysqli_query($mysqli, "SELECT SUM(total) AS totalamt
FROM payments WHERE username='$user' ;" );
$data3=mysqli_fetch_assoc($result3);

?>

<!--  -->
          <div class="col-xl-4 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-speech warning font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                      <h3><?php echo $data['total'];?></h3>
                      <span>Total Prescriptions</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-graph success font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                      <h3><?php echo $data1['payment'];?></h3>
                      <span>Total Payments</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-pointer danger font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                      <h3><?php echo $data2['appointment'];?></h3>
                      <span>Total Bookings</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      
      
       
      </section>
      
      <section id="stats-subtitle">
      <div class="row">
        <div class="col-12 mt-3 mb-1">
          <h4 class="text-uppercase">My Payments</h4>
       
        </div>
      </div>
    
      <div class="row">
     
    
        <div class="col-xl-6 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                  <div class="align-self-center">
                    <h1 class="mr-2">Rs.<?php echo $data3['totalamt'];?></h1>
                  </div>
                  <div class="media-body">
                    <h4>Total Cost</h4>
           
                  </div>
                  <div class="align-self-center">
                    <i class="icon-wallet success font-large-2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    
    </div>