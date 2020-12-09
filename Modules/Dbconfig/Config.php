<?php

$databaseHost = 'localhost';
$databaseName = 'hospital';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


// Check connection
if (!$mysqli) {
    // die("Connection failed: " . mysqli_connect_error());

				//redirectig to the display page. In our case, it is index.php
				header("Location: ../../View/ConnectionFail.html");


  }
//   echo "Connected successfully";
?>
