<?php
//including the database connection file
include("../../Dbconfig/Config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM appointment WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:List.php");
?>

