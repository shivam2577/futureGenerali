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
		if(isset($_POST["username"]) && isset($_POST["phno"]) && isset($_POST["confirmpass"]) && isset($_POST["password"]) && isset($_POST["email"]))
		{
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$name = mysqli_real_escape_string($conn,$_POST['username']);
			$contact = mysqli_real_escape_string($conn,$_POST['phno']);
			$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
			$nsales = md5(mysqli_real_escape_string($conn,$_POST['nsales']));
			$experience = md5(mysqli_real_escape_string($conn,$_POST['experience']));
			$emp_status = md5(mysqli_real_escape_string($conn,$_POST['emp_status']));
			$msg = "PASS";
			$vkey=md5(time().$email);

			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				if(!(empty($name) || empty($email) || empty($contact) || empty($password) || empty($pass_confirm) ))
				{
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					
					
					if(!preg_match("/^[a-zA-Z ]*$/",$name)){
						$name_err = "name invalid";	$f = 0;
					}

					if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
						$email_err = "email not valid"; $f = 0;
					}

					if($password!=$pass_confirm){
						$pass_err = "passwords do not match";$f = 0;
					}

					if((strlen((string)$contact)==10) && (preg_match("/^[789]\d{9}$/",$contact)))
					{
						$query = "SELECT acontact FROM alogin WHERE acontact = '{$contact}'";
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

						$query = "INSERT INTO alogin(acontact,apassword,aemail,avkey) VALUES('$contact','$password','$email','$vkey');INSERT INTO agent(aname,acontact,aemail,apassword,nsales,emp_status,experience) VALUES('$name','$contact','$email','$password','$nsales','$emp_status','$experience');";
						$result = mysqli_multi_query($conn,$query);
						if($result){
						
							$query1 = "SELECT aid from agent where acontact='$contact'";
							$result = mysqli_query($conn,$query1);
							$row = $result->fetch_assoc();							

							echo $row['aid'];

/*
							$query2 = "INSERT INTO alogin(aid) VALUES('$contact','$password','$email','$vkey');";
						$result = mysqli_query($conn,$query2);*/
							$to=$email;
						    $subject="Please verify your email address";
						    $message="Dear $name, Click <a href='http://localhost/future_agents/asignup/verify.php?vkey=$vkey'>here</a> to verify your account.";
						    $headers="From: emailverificationbot100@yahoo.com \r\n";
						    $headers.="MIME-Version:1.0" . "\r\n";
						    $headers.="Content-type:text/html;charset=UTF-8" . "\r\n";
						    
						    
						    //mail($to,$subject,$message,$headers);
						    //echo "<script>alert('A verification mail is sent to your mail id, verify your account to login. Please check spam folder.');window.location.href='../alogin/login.php';</script>";
						   // header("Location:../alogin/login.php");				
							
						}
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
	<?php// require_once '../header.php';?>
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
			<div class="form-group"><label>Number of sales:</label><input type="text" name="nsales" class="form-control" placeholder="Number of sales"></div>
			<div class="form-group"><label>Experience:</label><input type="text" name="experience" class="form-control" placeholder="Experience(YRS)"></div>
			
			<div class="form-group"><label>Employment Status:</label><select required class="custom-select" placeholder="Employment Status" name="emp_status" >
                <option value="employed">Employed</option>
                <option value="unemployed">Unemployed</option>
        	</select></div>	






			<div class="form-group"><label>Password:</label><input type="Password" name="password" class="form-control" placeholder="Enter Password" value=""></div>
			<div class="form-group"><label>Confirm Password:</label><input type="Password" name="confirmpass" class="form-control" placeholder="Confirm Password" value=""></div>
			<input type="submit" name="register_btn" value="Register" class="btn btn-info">
	</form>
	<p class="lead" style="margin-top:5px;">Already have an Account?<a href="../alogin/login.php">Login</a></div>
</div>
</div>
</div>
	<?php require_once '../footer.php';?>

<center>
<?php  
	$error=NULL;
?>	
</center>

</body>
</html>