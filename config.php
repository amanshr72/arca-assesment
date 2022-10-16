<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assesment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully </br>";

/* get cards where relase year = selected year */
  $sql="SELECT * FROM `mytable` WHERE `Year` = $year ";
  $result=mysqli_query($conn,$sql);
  
?>