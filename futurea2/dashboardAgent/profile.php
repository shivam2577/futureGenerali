<?php 
require('../config/db.php');
require('../config/config.php');
//error_reporting(E_ERROR|E_PARSE);
session_start();


$name = $_SESSION['name'];
$aid = $_SESSION['aid'];
echo "Session aid".$aid;
/*$query = "SELECT * FROM agent where aid=' ".$_SESSION['aid']." ' ";

$res= mysqli_query($conn,$query);

$detailss= mysqli_fetch_array($res,MYSQLI_ASSOC);
echo "string";
*/

if(isset($_POST['submit'] )){


    echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
	$name= $_POST['name'];
	$email= $_POST['email'];
	$phone = $_POST['phone'];
	$location= $_POST['city'];
	$pan = $_POST['pan']; 
	$license = $_POST['license'];
	$qualification = $_POST['qualification'];
	$dob = $_POST['date'];
	$pin = $_POST['pincode'];
	$smcontact = $_POST['refer'];
	echo $pan;
	echo "gdhdhgddddgh";
	echo $qualification;



	$query1= "UPDATE `agent` SET `alocation`='$location',`apin`='$pin',`aqualification`='$qualification',`adob`='$dob',`alicense`='$license',`apan`='$pan' WHERE `aid`='$aid'";
			  /*UPDATE 'alogin' SET 'acontact' = '$phone','aemail'='$email', where 'aid' = '$aid';
			 ;*/






	$res1= mysqli_query($conn,$query1);
	if($res1){
		echo "success";

	}
	if($smcontact != "" AND $res1){
		$query = "UPDATE agent set sid = (select sid from salesmanager where scontact = '$smcontact') where aid = $aid; UPDATE agentstatus set sid= (select sid from salesmanager where scontact = '$smcontact') where aid = '$aid'";
		$result= mysqli_multi_query($conn,$query);
		if($result){
			echo "1";
		}
		else{
			echo "error in query";# code...
		}
	}

	//header("location: hpofile.php");




}

/*if (isset($_POST['cancel'])) {
	header("location: hprofile.php");
}
*/


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
		        	<a class="nav-link" href="home.php">Home<!-- <span class="sr-only">(current)</span>--></a>
		      	</li>
		      	<li class="nav-item active">
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
		<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;height: calc(100vh - 0px);padding-top: 100px;position: fixed;z-index: -1">
        	<div class="sidebar-sticky">
          		<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>

            	<ul class="nav flex-column">
        			<li class="nav-item">
		    	    	<a class="nav-link" href="home.php">Home</a>
			    	</li>
		      		<li class="nav-item ">
		        		<a class="nav-link active " href="profile.php">Profile</a>
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

         <div class="col-md-6" style="margin-top: 100px;margin-left: 500px;position: absolute;">

      
        <form class="form-container" method="post" style=" position: absolute;top: 5vh;background: #ffffff;padding: 30px;border-radius: 10px;box-shadow: 0 6px 6px 0 rgba(0,0,0,0.4), 0 0 0 2px rgba(0,0,0,0.08);">
			<h1 align="center">ARF Form</h1>
    		<!-- <button class="btn btn-primary my-2 my-sm-0" style="float: right" type="submit" name="edit">EDIT</button> -->
    		<br><br>
            
            <input required type="text" class="form-control" placeholder="Name" name="name" pattern="[A-Za-z]{1,15}" title="Must Contain Letters" readonly>
                               
          	<input required type="email" class="form-control" placeholder="Email" name="email" style="margin-top:10px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email Id" readonly>
            <input required type="tel" class="form-control" placeholder="Phone" name="phone" style="margin-top:10px" pattern="[789][0-9]{9}$" title="Invalid contact" readonly >
            <p style="margin-top:10px">Address :</p>
            <input required type="text" class="form-control" placeholder="Address" name="address" style="margin-top:10px" title="Must Contain Letters" >
			       
          
	        <div class="row">
	        	<div class="col-sm-6">
	            	<input required type="text" class="form-control" placeholder="City" style="margin-top:10px" name="city" pattern="{1,15}" title="Must Contain Letters" >
	            </div>
	            <div class="col-sm-6">
	            	<input required type="number" class="form-control" placeholder="Pincode" style="margin-top:10px" name="pincode" pattern="[0-9]{6}" title="xxxxxx" >
	            </div>
	        </div>
          	<input required type="text" class="form-control" placeholder="Date Of Birth" name="date" style="margin-top:10px" >
		  	<p style="margin-top:10px">Education Qualifications:</p>
         	<select required class="custom-select" placeholder="Mr." name="qualification" >
                <option value="Class X">Class X</option>
                <option value="Class XII">Class XII</option>
                <option value="Graduate">Graduate</option>
				<option value="Post Graduate">Post Graduate</option>
        	</select>
      		<p style="margin-top:10px">Previous Agent License:</p>
          		<select required class="custom-select" placeholder="Mr." name="license" >
                	<option value="Yes">Yes</option>
                	<option value="NO">No</option>
                </select>
		    <input required type="text" class="form-control" placeholder="PAN Card Number" name="pan" style="margin-top:10px" pattern="^[A-Z]{5}[0-9]{4}[A-Z]{1}$" title="AAAAA0000A" >
		    <input required type="text" class="form-control" placeholder="Referal/Sales Manager Contact" name="refer" style="margin-top:10px">
		    <input type="submit" name="submit">
            <!-- <button type="submit" class="btn btn-info" style="width:100%;height:40px;font-size: 14px;margin-top:30px"><b>SUBMIT</b></button> -->
		</form>
 
  	</div>
 

      
	</div>


</body>
</html>