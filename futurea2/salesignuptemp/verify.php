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
  $sql="SELECT sverified,svkey FROM salesmanager WHERE sverified 0 AND svkey='$vkey' LIMIT 1";
  $resultSet=$conn->query($sql);
  $update=$conn->query("UPDATE salesmanager SET sverified=1 WHERE svkey='$vkey' LIMIT 1");
    if ($update) {
      header("location:../salessignup/login.php");
    }
    else {
      echo "\n Error: \n" . $sql . "<br>" . $conn->error;
            header("location:rform.php");
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
