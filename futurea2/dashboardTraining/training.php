<?php 
require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();


$name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Future_agents</title>
	<?php require_once '../boilerplate.php';?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 6px 6px 0 rgba(0,0,0,0.4), 0 0 0 2px rgba(0,0,0,0.08);position: fixed;width: 100%;z-index: 1"> 
		  <a class="navbar-brand" href="../index.php"><img  src="../img/logo7.png"></a>
		  
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		    
		      
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">IC38</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="training.php">Training</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="profile.php">Profile</a>
		      </li>
		  	</ul>	
			<?php if($_SESSION['user_logged_in']): ?>
			<form class="form-inline ml-auto">
		    	<a href="../logout.php" class="btn btn-danger" style="color:white">Logout</a>
		    </form>
		    <?php else: ?>
			<form class="form-inline ml-auto">
		    	<a href="../trainlogin/login.php" class="btn btn-danger" style="color:white">Login</a>
		    </form>
		<?php endif;?>
		  </div>
		</nav>
<div class="container-fluid row">
<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;height: calc(100vh - 0px);padding-top: 100px;position: fixed;">
          <div class="sidebar-sticky">
          	<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>
            <ul class="nav flex-column">     
		      
		      	<li class="nav-item">
		      	  	<a class="nav-link" href="index.php">IC38</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link active" href="training.php">Training</a>
		      	</li>
		      		<li class="nav-item ">
		        	<a class="nav-link" href="profile.php">Profile</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="../logout.php">Log Out</a>
		      	</li>
            </ul>
            <ul class="nav flex-column" style="text-align: center; padding-top: 50px">
            	<li class="nav-item">
		        	<img src="../img/dashboard/user.png">
		      	</li>
		      	<li class="nav-item">
		      		<span style="color: white"><?php echo $name;?></span>
		      	</li>
            </ul>     
          </div>
        </nav>
        <div class="col-md-8 offset-md-2" style="padding:50px;padding-top: 120px;float: left;">
        		<form  method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
    <button type="submit" class="btn btn-outline-warning" name="submit">Upload</button>
    <?php  echo "<br>Select Course type : "; ?>
    <select name="InsurancePolicies">
    <option value="Health">Health</option>
    <option value="Home">Home</option>
    <option value="Vehicle">Vehicle</option>
  </select>
</form>

<?php

$mysqli = mysqli_connect('localhost', 'root', '','future');

// Check connection
if (mysqli_connect_errno()) {
	echo "failed to connect".mysqli_connect_errno();
   }



if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$type= $_POST['InsurancePolicies'] ;
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed  = array('mp4','ogg','png','jpg','ppt','pptx','pdf','mp3');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
	
			//$fileDestination = 'uploads'.$fileName;
			move_uploaded_file($fileTmpName, 'uploads/'.$fileName);
			$s = "INSERT INTO `media`(`mtype`, `mname`) VALUES ('$type','$fileName')";
			if (mysqli_query($mysqli,$s)) {
				echo "<br>Uploaded";
			}
			

		} else {
			echo "Error";
		}


	} else {
		echo "PLease upload --> video or image or pdf ( mp4/ogg/jpg/png/pdf )<br><br>";
	}
    echo "<br><br>Contents: <br><br>";
     echo "<br><br>Health Insurance Policy: <br>";
     $p = "SELECT `mid`, `mtype`, `mname` FROM `media` WHERE `mtype`='Health'";


		$query=	mysqli_query($mysqli,$p);
		while ($row=mysqli_fetch_assoc($query)) {
		$type=$row['mtype'];	
		$id=$row['mid'];
		$name=$row['mname'];
		
			
	      echo "<a href='watch.php?id=$id'>$name</a><br>";
		}
     
       echo "<br><br>Home Insurance Policy: <br>";
       $p = "SELECT `mid`, `mtype`, `mname` FROM `media` WHERE `mtype`='Home'";


		$query=	mysqli_query($mysqli,$p);
		while ($row=mysqli_fetch_assoc($query)) {
		$type=$row['mtype'];	
		$id=$row['mid'];
		$name=$row['mname'];
		
			
	      echo "<a href='watch.php?id=$id'>$name</a><br>";
		} 


		echo "<br><br>Vehicle Insurance Policy: <br>";
        $p = "SELECT `mid`, `mtype`, `mname` FROM `media` WHERE `mtype`='Vehicle'";


		$query=	mysqli_query($mysqli,$p);
		while ($row=mysqli_fetch_assoc($query)) {
		$type=$row['mtype'];	
		$id=$row['mid'];
		$name=$row['mname'];
		
			
	      echo "<a href='watch.php?id=$id'>$name</a><br>";
		}
  
}?>
        </div>
    </div>
</body>
</html>