<form class="form-inline" method="post" action="search.php">
    <input type="text" name="username" class="form-control" placeholder="Search username ">
    <button type="submit" name="save" class="btn btn-primary">Search</button>

    <?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","hospital");
if(count($_POST)>0) {
$username=$_POST[username];
$result = mysqli_query($conn,"SELECT * FROM doctors where username='$username' ");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<table>
<tr>
<td>Name</td>
<td>Email</td>
<td>Mobile No</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["mobile"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>