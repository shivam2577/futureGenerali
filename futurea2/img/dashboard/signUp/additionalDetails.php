<?php
$servername="localhost";
$username = "root";
$password = "shivam";
$dbname = "agent";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$hno=$_POST["hno"];
$street=$_POST["street"];
$town=$_POST["town"];
$district=$_POST["district"];
$state=$_POST["state"];
$country=$_POST["country"];
$pincode=$_POST["pincode"];
$address = $hno." ".$street." ".$town." ".$district." ".$state." ".$country." ".$pincode;
$qualification=$_POST["qualification"];
if (isset($_POST['pan'])) {
  $pan=$_POST["pan"];
}
?>