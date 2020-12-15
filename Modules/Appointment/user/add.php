<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../../Dbconfig/Config.php");

if(isset($_POST['Submit'])) {	
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$time = mysqli_real_escape_string($mysqli, $_POST['time']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$mobile = mysqli_real_escape_string($mysqli, $_POST['mobile']);
	$doctor = mysqli_real_escape_string($mysqli, $_POST['doctor']);
	$reason = mysqli_real_escape_string($mysqli, $_POST['reason']);


	// checking empty fields
	if(empty($date) || empty($time) || empty($mobile) || empty($username) || empty($reason) || empty($doctor)) {
				
		if(empty($date)) {
			echo "<font color='red'>Appointment Date field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($mobile)) {
			echo "<font color='red'>Mobile field is empty.</font><br/>";
		}
	
		if(empty($time)) {
			echo "<font color='red'>Appointment Time field is empty.</font><br/>";
		}
		
		if(empty($reason)) {
			echo "<font color='red'>Reason field is empty.</font><br/>";
		}
		if(empty($doctor)) {
			echo "<font color='red'>Appointment Doctor field is empty.</font><br/>";
		}
		
		//link to the previous pdoctor
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO appointment(time,date,username,mobile,doctor,reason) VALUES('$time','$date','$username','$mobile','$doctor','$reason')");
		
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




	</head>
	<body>



    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>*,
    *:before,
    *:after {
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Nunito', sans-serif;
      color: #384047;
      padding: 10px;
      background:#384047;
      margin-top:25px;
    }
    
    form {

    
      max-width: 300px;
      margin: 0px auto;
      padding: 30px 20px;
  
      background: #f4f7f8;
      border-radius: 8px;
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
    }</style>
 

    
</head>
</head>

<form action="add.php" method="post">

    <h1>Appointment</h1>
  
    <fieldset>
   <?php

session_start();


$user = $_SESSION['username'];

?>
      <label for="name">User Name:</label>
      <input type="text" id="name" value="<?php echo $user;?>" readonly  name="username">
 
      <label >Date:</label>
   
      <input id="datepicker" readonly name="date" width="100%" />
      <label >Time:</label>
      <input  id="timepicker" readonly name="time">
  
    </fieldset>
    <fieldset>

      <label >Contact No:</label>
      <input type="text" id="name"  name="mobile"></input>
    </fieldset>
    <fieldset>

      <label for="Reason">Reason:</label>
      <textarea id="reason" name="reason"></textarea>
    </fieldset>
	<select name="doctor">
    <option value="">Doctors</option>
    <?php
 $doctor = mysqli_query($mysqli,"SELECT * FROM doctors");
 while($m_row = mysqli_fetch_array($doctor))        
        echo("<option value = '" . $m_row['username'] . "'>" ."Dr. ". $m_row['username'] . "</option>");
    ?>
</select>
    <!--  -->
  

    
    <button  type="submit" name="Submit" >Book</button>
  
  </form>

  <script>
     $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });

        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap'
        });
    </script>