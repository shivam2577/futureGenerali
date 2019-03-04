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
	<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 33.33%;
  padding: 20px 10px;
  top: 20px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  background-color: #f1f1f1;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  /*min-width: 160px;*/
  width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 6px 6px 0 rgba(0,0,0,0.4), 0 0 0 2px rgba(0,0,0,0.08);position: fixed;width: 100%;z-index: 1"> 
		<a class="navbar-brand" href="../index.php"><img  src="../img/logo7.png"></a>
		  
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		    	<li class="nav-item active">
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
		      	<li class="nav-item">
		        	<a class="nav-link" href="training.php">Training</a>
		    	</li>

		  	</ul>	
			
			<form class="form-inline ml-auto">
		    	<a href="../logout.php" class="btn btn-danger" style="color:white">Logout</a>
		    </form>
		</div>
	</nav>
	
	<div class="container-fluid row">
		<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;height: calc(100vh - 0px);padding-top: 100px;position: fixed;z-index: -1">
        	<div class="sidebar-sticky">
          		<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>

            	<ul class="nav flex-column">
        			<li class="nav-item">
		    	    	<a class="nav-link active" href="home.php">Home</a>
			    	</li>
		      		<li class="nav-item ">
		        		<a class="nav-link " href="profile.php">Profile</a>
		      		</li>
		      		<li class="nav-item">
		      		  	<a class="nav-link" href="IC38.php">IC38</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="practice.php">Practice</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="training.php">Training</a>
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
       <div class="offset-md-2 col-md-10" style="margin-top:50px;padding: 30px;margin-left:0">
        <!-- <div class="container" style="margin-left: 300px">
	        <div class="col-md-12" style="margin-top:50px;padding: 30px;margin-left:0">
				<div style="font-weight: lighter;font-size: 5.5vw;">MCQs</div>
				<hr>
				<div class="container col-md-12">
					<?php require_once 'mcq11.php';?>
				</div>
			</div>
		</div> -->
		<div class="row">
<?php


    $p = "SELECT `aid`, `aemail`, `acontact`, `alocation`, `aname`, `apassword` FROM `agent` WHERE `sid`=1 OR `sid`=3";
    $query= mysqli_query($mysqli,$p);
    while ($row=mysqli_fetch_assoc($query)) {
    $contact=$row['acontact'];
    $name=$row['aname'];
    $Email=$row['aemail'];
    $Location=$row['alocation'];
    ?>
    <div class="column">
    <div class="card">
     
     <h2> <?php  echo "Name : ".$name; ?></h2>
     
     

     <div class="dropdown">
  <span><p><?php  echo "Number : ".$contact."<br>"; ?></p></span>
  <div class="dropdown-content">
  <p> <?php  echo "Email id : ".$Email."<br>"; ?></p>
  <p> <?php  echo "Location : ".$Location."<br>"; ?></p>
  </div>
</div>
      
    </div>
  </div>
   <?php     
    }
    ?>

</div>

	</div>
</body>
</html>