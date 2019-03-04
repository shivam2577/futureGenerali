<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "future";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sid=$_POST["sid"];
	$acontact=$_POST["assignedphno"];

$sql = "UPDATE agent SET sid='$sid' WHERE acontact='$acontact'; 
		UPDATE agentstatus SET sid='$sid' WHERE acontact='$acontact'";


if ( $conn->multi_query($sql)) {
    header("location:../dashboardBmanager/home.php");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
