<?php 

require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();

	
if(isset($_POST['submit'])){ 		//TO CHECK LOGIN BUTTON CLICK

if(empty($_POST['number']) || empty($_POST['password'])){  //THE FILEDS CANNOT BE EMPTY
echo "FILL ALL THE DETAILS".'<br>';
}

else{

$mobile=$_POST['number'];
$pass=md5($_POST['password']);
echo $pass;
echo $mobile;
$sql=" select * from alogin where acontact='$mobile' AND apassword = '$pass' and averified=1";  //QUERY  
//$sql="select a.aid, al.averified from agent as a INNER JOIN alogin as al ON a.acontact=al.acontact where al.acontact=$mobile AND al.apassword = $pass and al.averified=1";

$result=mysqli_query($conn,$sql);	//PERFORMS THE QUERY AGAINST THE DATABASE

if($result){
$sql = "select * from agent where acontact = $mobile";  
$result=mysqli_query($conn,$sql);
}									//RETURNS mysqli_result OBJECT ON TRUE ELSE FALSE

$count=mysqli_num_rows($result);  	//RETURNS NUMBER OF ROWS IN RESULT SET



if($count)
{				//TO ACCESS THE DATA IN ANOTHER .PHP FILE
	$_SESSION['number']=$_POST['number'];
	$_SESSION['password']=$_POST['password'];
	$details = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$_SESSION['aid'] = $details['aid'];
	$_SESSION['name'] = $details['aname'];
	$_SESSION['user_type'] = "aid";
	$_SESSION['user_logged_in'] = true;

	header('location:../dashboardAgent/');	//REDIRECT TO SPECIFIED LOC:
}
else{
	$error = "ENTER CORRECT NUMBER OR PASSWORD".'<br>';

}
}
}
 ?>



<!DOCTYPE html>
<html>
	<head>
		<?php require_once '../boilerplate.php'; ?>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php require_once '../header.php'; ?>
		<div class="cover">
		<div class="row">
		<div class="col-md-6 offset-md-6">
		<div class="jumbotronlogin">
			<h1 class="display-5" style="font-weight:150;">Login</h1>
			<hr width="95%" style="border: solid white 0.3px;margin-left: 0">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Phone Number</label>
			    <input name="number" type="tel" class="form-control" id="exampleInputEmail1" placeholder="phone number">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Login</button>
			  <p class="lead" style="margin-top:5px;">Create an Account?<a href="../asignup/rform.php">Register</a>
			</form>
		</div>
		</div>
		</div>
		</div>
		</div>	
		<?php require_once '../footer.php'; ?>	

		<center>
			<?php 
$error=NULL;
 ?>
</center> 
	</body>
</html>