<?php  require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();
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
		      
		    	<li class="nav-item ">
		        	<a class="nav-link" href="home.php">Agents<!-- <span class="sr-only">(current)</span>--></a>
		      	</li>
		      	<li class="nav-item active">
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
	
	<div class="container-fluid row">
		<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;height: calc(100vh - 0px);padding-top: 100px;position: fixed;z-index: -1">
        	<div class="sidebar-sticky">
          		<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>

            	<ul class="nav flex-column">
        			<li class="nav-item">
		    	    	<a class="nav-link" href="home.php">Agents</a>
			    	</li>
		      		<li class="nav-item ">
		        		<a class="nav-link active " href="profile.php">Agent Verification</a>
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
		      			<span style="color: white">name</span>
		      		</li>
            	</ul>     
          	</div>
        </nav>
        	<div class="offset-md-2 col-md-4" style="margin-top:200px;padding: 30px;margin-left:550px">
        		
        		<form class="form-container" method="post">
                        <input required type="text" class="form-control" placeholder="Agent ID" name="aid" >
        				<button class="btn btn-primary my-2 my-sm-0" style="float: right" type="submit" name="submit">SUBMIT</button>



        		</form>
<?php        
if (isset($_POST['submit'])) { 

	$aid = $_POST['aid'];
	session_start();
	$_SESSION['aid']=$aid;


	?>
<h1>Agent Verification</h1>

<form  method="post">
	<?php 
	$p = "SELECT  `ARF`, `ic38`, `adocument`, `apayment` FROM `agentstatus` WHERE `aid`='{$aid}'";
    $query= mysqli_query($conn,$p);
    while ($row=mysqli_fetch_assoc($query)) {
    	 $contact1=$row['ARF'];
    	 $contact2=$row['ic38'];
    	 $contact3=$row['adocument'];
    	 $contact4=$row['apayment'];
    	}
    	
if ($contact1==0) {
?>

	<font size="6">
<input  type="checkbox" name="check_list[]" value="ARF Form"><label>ARF Form</label></font>

<?php echo "<br>";  
}
if ($contact3==0) {
?><font size="6">
<input type="checkbox" name="check_list[]" value="Documents"><label>Documents</label></font>
<?php echo "<br>";  }
if ($contact2==0) {
?><font size="6">
<input type="checkbox" name="check_list[]" value="IC38 certificate"><label>IC38 certificate</label></font>
<?php echo "<br>";  }
if ($contact4==0) {
?><font size="6">
<input type="checkbox" name="check_list[]" value="Payment(ic38)"><label>Payment(IC38)</label></font>
<?php  } echo "<br>";?>
<input type="submit" name="submit" Value="Submit"/>
<!----- Including PHP Script ----->
<?php 
	if(isset($_POST['submit'])){
		
$aid = $_SESSION['aid'];
if(!empty($_POST['check_list'])) {

$checked_count = count($_POST['check_list']);
echo "You have selected following ".$checked_count." option(s): <br/>";

foreach($_POST['check_list'] as $selected) {


	$arf[]=$selected;
	
echo "<p>".$selected ."</p>";
}

$aid = $_SESSION['aid'];
    if ($arf[0]=='ARF Form' OR $arf[1]=='ARF Form' OR $arf[2]=='ARF Form' OR $arf[3]=='ARF Form') {
    $p = "UPDATE `agentstatus` SET `ARF`=1 WHERE `aid`='10'";
    $query= mysqli_query($conn,$p);
	}

	if ($arf[0]=='IC38 certificate' OR $arf[1]=='IC38 certificate' OR $arf[2]=='IC38 certificate' OR $arf[3]=='IC38 certificate') {
	$p = "UPDATE `agentstatus` SET `ic38`=1 WHERE `aid`='10'";
    $query= mysqli_query($conn,$p);}

    if ($arf[0]=='Documents'OR $arf[1]=='Documents' OR $arf[2]=='Documents' OR $arf[3]=='Documents' ) {
    $p = "UPDATE `agentstatus` SET `adocument`=1 WHERE `aid`='10'";
    $query= mysqli_query($conn,$p);}

    if ($arf[0]=='Payment(ic38)' OR $arf[1]=='Payment(ic38)' OR $arf[2]=='Payment(ic38)' OR $arf[3]=='Payment(ic38)') {
    $p = "UPDATE agentstatus SET apayment=1 WHERE aid = '10'";
    $query= mysqli_query($conn,$p);}


}

}
?>
</form>
<!-- </div>
</div> -->
<?php } ?>
       </div>
	</div>

</body>
</html>