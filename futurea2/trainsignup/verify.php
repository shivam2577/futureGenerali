<?php
if(isset($_GET['vkey'])){
  $vkey=$_GET['vkey'];
  $servername="localhost";
  $username = "root";
  $password = "";
  $dbname = "future";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    $error="Database Connection Failed";
    die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT tverified,tvkey FROM tteam WHERE tverified 0 AND tvkey='$vkey' LIMIT 1";
  $resultSet=$conn->query($sql);
  $update=$conn->query("UPDATE tteam SET tverified=1 WHERE tvkey='$vkey' LIMIT 1");
    if ($update) {
      header("location:../trainlogin/login.php");
    }
    else {
      echo "\n Error: \n" . $sql . "<br>" . $conn->error;
            header("location:rform.php");
    }

}

 else {
      echo "Approval failed, please try again";
            header("location:rform.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
