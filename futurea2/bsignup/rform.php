<?php
require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
/*session_start();*/
$errors=array();
$perror="";
$uerror="";
$eerror="";
$pherror="";
$passerror="";
//---------------------------------------------------------------------------------------------
$email_err = $name_err = $pass_err = $contact_err = "";
	$f = 1;
	if(filter_has_var(INPUT_POST, 'register_btn'))
	{
		if(isset($_POST["username"]) && isset($_POST["phno"]) && isset($_POST["confirmpass"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["bbranch"]) && isset($_POST["blocation"]))
		{
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$name = mysqli_real_escape_string($conn,$_POST['username']);
			$contact = mysqli_real_escape_string($conn,$_POST['phno']);
			$bbranch = mysqli_real_escape_string($conn,$_POST['bbranch']);
			$blocation = mysqli_real_escape_string($conn,$_POST['blocation']);
			$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
			$pass_confirm = md5(mysqli_real_escape_string($conn,$_POST['confirmpass']));
			$msg = "PASS";

			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				if(!(empty($name) || empty($email) || empty($contact) || empty($password) || empty($pass_confirm) || empty($bbranch) || empty($blocation)))
				{
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					$website = strpos($website, 'http') !== 0 ? "https://$website" : $website;
					$website = filter_var($website, FILTER_SANITIZE_URL);
					
					if(!preg_match("/^[a-zA-Z ]*$/",$name)){
						$name_err = "name invalid";	$f = 0;
					}

					if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
						$email_err = "email not valid"; $f = 0;
					}

					if($password!=$pass_confirm){
						$pass_err = "passwords do not match";$f = 0;
					}

					if((strlen((string)$contact)==10) && (preg_match("/^[6789]\d{9}$/",$contact)))
					{
						$query = "SELECT bcontact FROM bmanager WHERE bcontact = '{$contact}'";
			   			$result = mysqli_query($conn,$query);
		   				$count = mysqli_num_rows($result);
		   				if($count)
		   				{
		   					$contact_err = "Contact already exists"; 
		   					$f=0;
		   				}
		   			}
		   			else{
							$contact_err = "invalid contact"; 
							$f=0;
					}

					if($f == 1){
						// $query = "INSERT INTO blogin(acontact,apassword,aemail) VALUES('$contact','$password','$email');INSERT INTO agent(aname,acontact,aemail,apassword) VALUES('$name','$contact','$email','$password');";
						
					$query="INSERT INTO bmanager (bemail,bpassword,bcontact,bbranch,blocation) VALUES ('$email','$password','$contact','$bbranch','$blocation');";
						echo "Rada";
						$result = mysqli_query($conn,$query);
						if($result)
							header("Location:../blogin/login.php");
						else
							echo "error during account creation";
						mysqli_close($conn);
					}

				}
				else
				{
					$msg = "*Please fill all details";
					$msgClass = 'alert-danger';
				}
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<?php require_once '../boilerplate.php';?>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<?php require_once '../header.php';?>
	<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6">
	<div class="jumbotronsignup">
	<h1 class="display-5" style="font-weight:150;">Register</h1>
	<hr width="95%" style="border: solid white 0.3px;margin-left: 0">
	<form method="post" action="rform.php">
			<div class="form-group"><label>Name:</label> <input type="text" name="username" class="form-control" placeholder="Enter your Name" required></div>
			<div class="form-group"><label>PhoneNumber:</label> <input type="text" name="phno" class="form-control" placeholder="Phone Number"></div>
			<div class="form-group"><label>E-Mail Id:</label><input type="text" name="email" class="form-control" placeholder="e-mail"></div>
			<div class="form-group"><label>Branch Location:</label><input type="text" name="blocation" class="form-control" placeholder="Branch Location" value=""></div>
			<div class="form-group"><label>Branch Name:</label><input type="text" name="bbranch" class="form-control" placeholder="Branch Name" value=""></div>
			<div class="form-group"><label>Password:</label><input type="Password" name="password" class="form-control" placeholder="Enter Password" value=""></div>
			<div class="form-group"><label>Confirm Password:</label><input type="Password" name="confirmpass" class="form-control" placeholder="Confirm Password" value="">
			</div>
			
			<input type="submit" name="register_btn" value="Register" class="btn btn-info">
	</form>
	<p class="lead" style="margin-top:5px;">Already have an Account?<a href="../blogin/login.php">Login</a></div>
</div>
</div>
</div>

	<?php require_once '../footer.php';?>

</body>
</html>