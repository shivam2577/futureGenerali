<?php
$servername="localhost";
$username = "root";
$password = "";
$dbname = "future";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$bbranch=$_SESSION['bbranch'];

if(isset($_POST['sname']))
{
  $sname =$_POST['sname'];
  $sql = "SELECT * FROM  salesmanager WHERE sname ='$sname'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {
      // output data of each row
      $data=array();
      $row = $result->fetch_assoc();
      $sid=$row["sid"];
      $sname=$row["sname"];
      $scontact=$row["scontact"];
      $semail=$row["semail"];
      $slocation=$row["slocation"];
      $sbranch=$row["sbranch"];
      $data=[$sname,$scontact,$semail,$slocation,$sbranch,$sid];
     echo json_encode($data);


  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else
{
      $sql = "SELECT * FROM salesmanager where sbranch='$bbranch'";
      $result = $conn->query($sql);
 
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc())
            {
                $sid=$row["sid"];
                $sname=$row["sname"];
                $scontact=$row["scontact"];
                $data[] = array("sid" => $sid,"sname" => $sname,"scontact" => $scontact);
            }
          echo(json_encode($data));
        } else {  
              echo "Error: " . $sql .  $conn->error;
          }
      }    


$conn->close();

?>
