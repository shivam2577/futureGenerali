<?php 
require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();


$name = $_SESSION['name'];

if(isset($_POST['submit']))
{
	$type = $_POST['InsurancePolicies'];
	//echo $type;
	if ($type=='Health') {
	
	
	$r = "SELECT `mid`,`mname` FROM `media` where `mtype`='Health' ";
    $query1=mysqli_query($conn,$r);
    while ($row=mysqli_fetch_assoc($query1)) {
		
		$medianame=$row['mname'];
		$fileExt = explode('.', $medianame);
	    $fileActualExt = strtolower(end($fileExt));

		$allowed  = array('mp4','ogg','mp3');
		$allowed1  = array('png','jpg');
		$allowed2  = array('pdf');
		$allowed3  = array('ppt','pptx');

		if (in_array($fileActualExt, $allowed)) {




			echo "<video width='400' height ='200' controls><source src = '../dashboardTraining/uploads/".$medianame."' type = 'video/mp4'><source src = '../dashboardTraining/uploads/".$medianame."' type = 'video/ogg'></video><br>";

	    }
	    if (in_array($fileActualExt, $allowed1)) {


			echo "<img src ='../dashboardTraining/uploads/".$medianame."' width='400' height='400'>";


		}
		
		
	}
}
    elseif ($type=='Home') {
    	
    
	$r = "SELECT `mid`,`mname` FROM `media` where `mtype`='Home'";
    $query1=mysqli_query($conn,$r);
    while ($row=mysqli_fetch_assoc($query1)) {
		
		$medianame=$row['mname'];
		$fileExt = explode('.', $medianame);
	    $fileActualExt = strtolower(end($fileExt));

	$allowed  = array('mp4','ogg','mp3');
	$allowed1  = array('png','jpg');
	$allowed2  = array('pdf');
	$allowed3  = array('ppt','pptx');

	if (in_array($fileActualExt, $allowed2)) {




		echo "<a href='../dashboardTraining/uploads/".$medianame."' style='text-decoration:none'>" ;
		echo $medianame. '------------------------ > ';
		echo "</a>";
		echo "<a style='text-decoration:none' download='".$medianame."' href='../dashboardTraining/uploads/".$medianame."'>" ;
		echo "DOWNLOAD <br>";
		echo "</a>";

    }
    if (in_array($fileActualExt, $allowed3)) {


		echo "<a style='text-decoration:none' download='<br><?php echo $medianame ?>' href='uploads/".$medianame ."?>'>";
		echo "download ppt"; 
		echo "</a>";


	}
		
		
	}
}


	   else{
    	
    
	$r = "SELECT `mid`,`mname` FROM `media` where `mtype`='Home'";
    $query1=mysqli_query($conn,$r);
    while ($row=mysqli_fetch_assoc($query1)) {
		
		$medianame=$row['mname'];
		$fileExt = explode('.', $medianame);
	    $fileActualExt = strtolower(end($fileExt));

	$allowed  = array('mp4','ogg','mp3');
	$allowed1  = array('png','jpg');
	$allowed2  = array('pdf');
	$allowed3  = array('ppt','pptx');

	if (in_array($fileActualExt, $allowed2)) {




		echo "<a href='../dashboardTraining/uploads/".$medianame."' style='text-decoration:none'>" ;
		echo $medianame. '------------------------ > ';
		echo "</a>";
		echo "<a style='text-decoration:none' download='".$medianame."' href='../dashboardTraining/uploads/".$medianame."'>" ;
		echo "DOWNLOAD <br>";
		echo "</a>";

    }
    if (in_array($fileActualExt, $allowed3)) {


		echo "<a style='text-decoration:none' download='<br><?php echo $medianame ?>' href='uploads/".$medianame ."?>'>";
		echo "download ppt"; 
		echo "</a>";


	}
		
		
	}
}
}

?>





<!DOCTYPE html>
<html>
<head>
	<title>Future_agents</title>
	<?php require_once '../boilerplate.php';?>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 6px 6px 0 rgba(0,0,0,0.4), 0 0 0 2px rgba(0,0,0,0.08);z-index: 1"> 
		  <a class="navbar-brand" href="../index.php"><img  src="../img/logo7.png"></a>
		  
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		      <li class="nav-item">
		        <a class="nav-link" href="home.php">Home<!-- <span class="sr-only">(current)</span>--></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="profile.php">Profile</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="IC38.php">IC38</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="practice.php">Practice</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="training.php">Training</a>
		      </li>
		      <li class="nav-item">
		        	<a class="nav-link" href="docupload.php">Upload</a>
		      </li>
		  	</ul>	
		  	<?php if($_SESSION['user_logged_in']): ?>
			<form class="form-inline ml-auto">
		    	<a href="../logout.php" class="btn btn-danger" style="color:white">Logout</a>
		    </form>
		    <?php else: ?>
			<form class="form-inline ml-auto">
		    	<a href="../alogin/login.php" class="btn btn-danger" style="color:white">Login</a>
		    </form>
		<?php endif;?>
		  </div>
		</nav>
<div class="container-fluid row">
<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;
    height: calc(100vh - 0px);padding: 15px;">
          <div class="sidebar-sticky">
          	<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>

            <ul class="nav flex-column">
        		<li class="nav-item">
		    	    <a class="nav-link" href="home.php">Home</a>
			    </li>
		      	<li class="nav-item ">
		        	<a class="nav-link" href="profile.php">Profile</a>
		      	</li>
		      	<li class="nav-item">
		      	  	<a class="nav-link" href="IC38.php">IC38</a>
		      	</li>
		      	<li class="nav-item">
		        <a class="nav-link" href="practice.php">Practice</a>
		      </li>
		      
		      	<li class="nav-item">
		        	<a class="nav-link active" href="training.php">Training</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="docupload.php">Upload</a>
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
		      		<span style="color: white"><?php echo $name; ?></span>
		      	</li>
            </ul>     
          </div>
        </nav>
        <div class="offset-md-2 col-md-8" style="margin-top:50px;margin-left:0;margin-right: auto;">

        	<form  method="POST" enctype="multipart/form-data">
	
				<div class="container-fluid row offset-md-2" >
				    <div style="float: left" class="col-md-3">Select Course type :</div>
				    <select class="col-md-3" name="InsurancePolicies" >
				    <option value="Health">Health</option>
				    <option value="Home">Home</option>
				    <option value="Vehicle">Vehicle</option>
				  	</select>
				  	<button type="submit" class="btn btn-success col-md-3" style="border-radius: 0" name="submit">Search</button>
				</div>
			</form>
		</div>
	<!-- <div class="container" style="margin-left: 300px">
	        <div class="col-md-12" style="margin-top:50px;padding: 30px;margin-left:0">
				<div style="font-weight: lighter;font-size: 5.5vw;">MCQs</div>
				<hr>
				<div class="container col-md-12">
					<?php require_once 'mcq11.php';?>
				</div>
			</div>
		</div> -->


</div>

</body>
</html>
