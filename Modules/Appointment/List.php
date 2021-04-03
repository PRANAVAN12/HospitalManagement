<?php
//including the database connection file
include_once("../Dbconfig/Config.php");




error_reporting(0);
if(count($_POST)>0) {
$username=$_POST[username];
$result2 = mysqli_query($mysqli,"SELECT * FROM appointment where username='$username' ");
}
elseif (!count($_POST)>0) {
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM appointment ORDER BY id DESC"); // using mysqli_query instead
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- Bootstrap CSS -->
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="../assets/css/feathericon.min.css">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">


    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
    .btn-primary {
        background-color: #09e5ab;
        border: 1px solid #09e5ab;
        margin-left: 3px;
    }

    .page-wrapper {
        margin-left: 240px;
        padding-top: 9px;
        position: relative;
        transition: all 0.4s ease;
    }

    .status {

        background-color: green;
        padding: 0px 7px;
        color: white;
        height: 9px;
        border-radius: 11px;
    }

    .status1 {

        background-color: red;
        padding: 0px 7px;
        color: white;
        height: 9px;
        border-radius: 11px;
    }

    .status2 {

        background-color: yellow;
        padding: 0px 7px;
        color: white;
        height: 9px;
        border-radius: 11px;
    }

    #abc {
        width: 100%;
        height: 100%;
        opacity: .95;
        top: 0;
        left: 0;
        display: none;
        position: fixed;
        background-color: #313131;
        overflow: auto
    }

    img#close {
        position: absolute;
        right: -14px;
        top: -14px;
        cursor: pointer
    }

    div#popupContact {
        position: absolute;
        left: 50%;
        top: 17%;
        margin-left: -202px;
        font-family: 'Raleway', sans-serif
    }

    form {
        max-width: 300px;
        min-width: 650px;
        padding: 10px 50px;
        border: 2px solid gray;
        border-radius: 10px;
        font-family: raleway;
        background-color: #fff
    }

    p {
        margin-top: 30px
    }

    h2 {
        background-color: #FEFFED;
        padding: 20px 35px;
        margin: -10px -50px;
        text-align: center;
        border-radius: 10px 10px 0 0
    }

    hr {
        margin: 10px -50px;
        border: 0;
        border-top: 1px solid #ccc
    }

    input[type=text] {
        width: 82%;
        padding: 10px;
        margin-top: 30px;
        border: 1px solid #ccc;
        padding-left: 40px;
        font-size: 16px;
        font-family: raleway
    }

    #name {
        background-image: url(../images/name.jpg);
        background-repeat: no-repeat;
        background-position: 5px 7px
    }

    #email {
        background-image: url(../images/email.png);
        background-repeat: no-repeat;
        background-position: 5px 7px
    }

    textarea {
        background-image: url(../images/msg.png);
        background-repeat: no-repeat;
        background-position: 5px 7px;
        width: 82%;
        height: 95px;
        padding: 10px;
        resize: none;
        margin-top: 30px;
        border: 1px solid #ccc;
        padding-left: 40px;
        font-size: 16px;
        font-family: raleway;
        margin-bottom: 30px
    }

    #submit {
        text-decoration: none;
        width: 100%;
        text-align: center;
        display: block;
        background-color: #FFBC00;
        color: #fff;
        border: 1px solid #FFCB00;
        padding: 10px 0;
        font-size: 20px;
        cursor: pointer;
        border-radius: 5px
    }

   

   

	h1 {
      margin: 0 0 30px 0;
      text-align: center;
    }
    
    input[type="text"],
 
   
    textarea,
    select {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      font-size: 14px;
      height: auto;
      margin: 0;
      outline: 0;
      padding: 10px;
      width: 100%;
      background-color: #e8eeef;
      color: #8a97a0;
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
      margin-bottom: 10px !important;
    }
    
    
    select {
      padding: 6px;
      height: 32px;
      border-radius: 2px;
    }
    
    button {
      padding: 19px 39px 18px 39px;
      color: #FFF;
      background-color: #4bc970;
      font-size: 18px;
      text-align: center;
      font-style: normal;
      border-radius: 5px;
      width: 100%;
      border: 1px solid #3ac162;
      border-width: 1px 1px 3px;
      box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
      margin-bottom: 10px;
      margin-top: 10px;
    }
    
    fieldset {
      margin-bottom: 30px;
      border: none;
    }
    
    legend {
      font-size: 1.4em;
      margin-bottom: 10px;
    }
    
    label {
      display: block;
      margin-bottom: 8px;
    }
    
    label.light {
      font-weight: 300;
      display: inline;
    }
    
  
    
    @media screen and (min-width: 480px) {
      form {
        max-width: 480px;
      }
    }
    </style>

</head>

<body>


    <div>




        <?php include '../../View/headers/newadmin.html';?>


        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">List of Appoitnments</h3>
                            <ul class="breadcrumb">

                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Admin</a></li>
                                <li class="breadcrumb-item active"><a href="List.php">Appoitnments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->





                <div class="container text-right">

                    <a onclick="div_show()" class="btn btn-success">Add Appoitment</a>
                </div>


                <div class="cont">

                    <form class="form-inline" method="post" action="List.php" style="border:0px !important">
                        <input type="text" name="username" class="form-control" placeholder="Search  Patient ">
                        <button type="submit" name="save" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="datatable table table-hover table-center mb-0">
                                            <thead>
                                                <tr>


                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Patient</th>
                                                    <th>Mobile</th>
                                                    <th>Doctor</th>
                                                    <th>Reason</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php	if($result2){

while($res = mysqli_fetch_array($result2)) { 
	echo "<tr>";
	echo "<td>".$res['date']."</td>";
	echo "<td>".$res['time']."</td>";
	echo "<td>".$res['username']."</td>";	
	echo "<td>".$res['mobile']."</td>";	
	echo "<td>".$res['doctor']."</td>";
	echo "<td>".$res['reason']."</td>";
	if ($res['status']=="Completed"){
		echo "<td>"."<span class='status'>".$res['status']."</span>"."</td>";
	  }elseif($res['status']=="Pending"){
		echo "<td>"."<span class='status2'>".$res['status']."</span>"."</td>";
	  }
	  else {
		echo "<td>"."<span class='status1' >".$res['status']."</span>"."</td>";
	  }
	echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fe fe-pencil'>Edit</i>    </a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}

}
		elseif(!$result2){
		while($res = mysqli_fetch_array($result)) { 	
			echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['time']."</td>";
			echo "<td>".$res['username']."</td>";	
			echo "<td>".$res['mobile']."</td>";	
			echo "<td>".$res['doctor']."</td>";
			echo "<td>".$res['reason']."</td>";
			if ($res['status']=="Completed"){
				echo "<td>"."<span class='status'>".$res['status']."</span>"."</td>";
			  }elseif($res['status']=="Pending"){
				echo "<td>"."<span class='status2'>".$res['status']."</span>"."</td>";
			  }
			  else {
				echo "<td>"."<span class='status1' >".$res['status']."</span>"."</td>";
			  }
	
		echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fe fe-pencil mr-2'>Edit</i></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
		}
					?> </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- /Page Wrapper -->
            </div>
        </div>
        <!-- /Main Wrapper -->



        <!--	Appointement Add Page Start-->
        <div id="abc">
            <!-- Popup Div Starts Here -->
            <div id="popupContact">
                <!-- Contact Us Form -->

                <form class="form-detail" name="form1" method="post" action="add.php">
				<a onclick="div_hide()" class="btn btn-success" style="margin-left: 535px;
    background: red;color:white"><i class="fe fe-close"></i></a>
                    <caption>
                        <h2>

                            Add Appointment
                        </h2>
                    </caption>
                    <fieldset class="form-group">
                        <label> Username</label> <input type="text" class="form-control" name="username">
                    </fieldset>

                    <fieldset class="form-group">
                        <label> Date</label> <input type="text" id="datepicker" readonly class="form-control"
                            name="date">
                    </fieldset>
                    <fieldset class="form-group">
                        <label> Time</label> <input type="text" class="form-control" id="timepicker" readonly
                            name="time" required="required">
                    </fieldset>



                    <select class="form-control" name="doctor">
                        <option value="">Doctors</option>
                        <?php
 $doctor = mysqli_query($mysqli,"SELECT * FROM doctors");
 while($m_row = mysqli_fetch_array($doctor))        
        echo("<option value = '" . $m_row['username'] . "'>" ."Dr. ". $m_row['username'] . "</option>");
    ?>
                    </select>

                    <fieldset class="form-group">
                        <label> Contact Num</label> <input type="text" class="form-control" name="mobile">
                    </fieldset>

                    <fieldset class="form-group">
                        <label> reason</label> <input type="text" class="form-control" name="reason">
                    </fieldset>
                    <button type="submit" name="Submit" class="btn btn-success">Save</button>
                </form>
                <!--	Appointement Add Page end-->

            </div>
            <!-- Popup Div Ends Here -->
        </div>

        <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });

        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap'
        });
        </script>

        <script>
        //Function To Display Popup
        function div_show() {
            document.getElementById('abc').style.display = "block";
        }
        //Function to Hide Popup
        function div_hide() {
            document.getElementById('abc').style.display = "none";
        }
        </script>
        <!-- jQuery -->
        <script src="../../View/home/assets/js/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="../../View/home/assets/js/popper.min.js"></script>
        <script src="../../View/home/assets/js/bootstrap.min.js"></script>

        <!-- Slimscroll JS -->
        <script src="../../View/home/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Datatables JS -->
        <script src="../../View/home/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../View/home/assets/plugins/datatables/datatables.min.js"></script>

        <!-- Custom JS -->
        <script src="../../View/home/assets/js/script.js"></script>

</body>

</html>