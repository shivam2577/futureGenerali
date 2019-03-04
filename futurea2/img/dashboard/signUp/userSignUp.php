<?php
$servername="localhost";
$username = "root";
$password = "shivam";
$dbname = "agent";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$initial=$_POST["initial"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$name = $initial." ".$fname." ".$lname;


$email=$_POST["email"];
$phone=$_POST["phone"];
$bdate=$_POST["date"];
$pass=$_POST["password"];

$sql="INSERT into table(name) values ('values');";
if(conn->multi_query($sql)){
  session_start();
}
else {
  echo "\n Error: \n" . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
