<?php  require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();
$name = $_SESSION['name'];
$sid = $_SESSION['sid'];
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
		        	<a class="nav-link" href="home.php">Agents<!-- <span class="sr-only">(current)</span>--></a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="profile.php">Agent Verification</a>
		      	</li>
		      	<!-- <li class="nav-item">
		        	<a class="nav-link" href="IC38.php">IC38</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="practice.php">Practice</a>
		      	</li>		      
		      	<li class="nav-item">
		        	<a class="nav-link" href="training.php">Training</a>
		    	</li> -->

		  	</ul>	
			
			<form class="form-inline ml-auto">
		    	<a href="../logout.php" class="btn btn-danger" style="color:white">Logout</a>
		    </form>
		</div>
	</nav>
	
	<div class="container-fluid row" style="margin: 0;padding: 0">
		<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;height: calc(100vh - 0px);padding-top: 100px;position: fixed;z-index: -1">
        	<div class="sidebar-sticky">
          		<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>

            	<ul class="nav flex-column">
        			<li class="nav-item">
		    	    	<a class="nav-link active" href="home.php">Agents</a>
			    	</li>
		      		<li class="nav-item ">
		        		<a class="nav-link " href="profile.php">Agent Verification</a>
		      		</li>
		      		<!-- <li class="nav-item">
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
		      		</li> -->
	            </ul>
            	<ul class="nav flex-column" style="text-align: center; padding-top: 50px">
            		<li class="nav-item">
		        		<img src="../img/dashboard/user.png">
		      		</li>
		      		<li class="nav-item">
		      			<span style="color: white"><?php echo $ppname; ?></span>
		      		</li>
            	</ul>     
          	</div>
        </nav>
       <div class="offset-md-2 col-md-10" style="margin-top:50px;padding: 30px;margin-left:250px">
        <!-- <div class="container" style="margin-left: 300px">
	        <div class="col-md-12" style="margin-top:50px;padding: 30px;margin-left:0">
				<div style="font-weight: lighter;font-size: 5.5vw;">MCQs</div>
				<hr>
				<div class="container col-md-12">
					<?php //require_once 'mcq11.php';?>
				</div>
			</div>
		</div> --><br>
		<br>
		<form method=post>
		<div class="row">
			<div class="form-group"><label>Sort by:</label><select required class="custom-select" placeholder="Employment Status" name="sorting" >
                <option value="experience">Experience</option>
                <option value="nsales">Number of Sales</option>
                <option value="emp_status">Employment Status</option>
        	</select>
        	<br>
        	<br>
        	<input type="submit" name="submit">
        </div>
    </div>
</form>

<div class="column">
	<?php
		if(isset($_POST['submit']))
		{
			$sorting = $_POST['sorting'];

			if ($sorting=='nsales') {
    				$p = "SELECT * FROM agent WHERE sid=$sid order by nsales desc";
			} 
			elseif($sorting=='emp_status') {
    				$p = "SELECT * FROM agent WHERE sid=$sid order by emp_status desc";
			}
			elseif($sorting=='experience') {
    				$p = "SELECT * FROM agent WHERE sid=$sid order by experience desc";
			}
	    
	    		$query= mysqli_query($conn,$p);
    
    		while ($row=mysqli_fetch_assoc($query)) {
    				$contact=$row['acontact'];
    				$name=$row['aname'];
    				$aid=$row['aid'];
    				$Email=$row['aemail'];
    				$Location=$row['alocation'];
    				$nsales=$row['nsales'];
    				$experience=$row['experience'];
    				$emp_status=$row['emp_status'];
    ?>
      
    <div class="row">
    	<div class="card" style="width:500px; ">
     	<h4> <?php  echo "Name : ".$name; ?></h4>
 			<div class="dropdown">
  				<span><p> <?php  echo "Number : ".$contact."<br>"; ?> </p></span>
  				<div class="dropdown-content">
  					<p> <?php  echo "Agent ID : ".$aid."<br>"; ?></p>
  					<p> <?php  echo "Email id : ".$Email."<br>"; ?></p>
  					<p> <?php  echo "Number of sales : ".$nsales."<br>"; ?></p>
  					<p> <?php  echo "Employment Status : ".$emp_status."<br>"; ?></p>
  					<p> <?php  echo "Experience : ".$experience."<br>"; ?></p>
  				</div>
			</div>
    	</div>
   </div>
<br>
<br>
   
<?php     
    }
?>

</div>
    
<?php
	}
?>

</div>
</div>

</body>
</html>