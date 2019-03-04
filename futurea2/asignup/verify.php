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
  $sql="SELECT averified,avkey FROM alogin WHERE averified 0 AND avkey='$vkey' LIMIT 1";
  $resultSet=$conn->query($sql);
  $update=$conn->query("UPDATE alogin SET averified=1 WHERE avkey='$vkey' LIMIT 1");
    if ($update) {
      header("location:../alogin/login.php");
    }
    else {
      echo "\n Error: \n" . $sql . "<br>" . $conn->error;
            header("location:signUp.php");
    }

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
