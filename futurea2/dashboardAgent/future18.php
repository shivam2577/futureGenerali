<!DOCTYPE html>
<html>
<head>
	<title>Future_agents</title>
</head>
<body>
	<form  method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
    <button type="submit" name="submit">Upload</button>
    <?php  echo "<br>Select Course type : ";  ?>
    <select name="InsurancePolicies">
    <option value="Health">Health</option>
    <option value="Home">Home</option>
    <option value="Vehicle">Vehicle</option>
    <option value="ic38">ic38</option>
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
	
	$type= 'ic38' ;
	
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
    echo "IC38: <br>";
    $p = "SELECT `mid`, `mtype`, `mname` FROM `media` WHERE `mtype`='ic38'";


		$query=	mysqli_query($mysqli,$p);
		while ($row=mysqli_fetch_assoc($query)) {
		$type=$row['mtype'];	
		$id=$row['mid'];
		$name=$row['mname'];
		
			
	      echo "<a href='watch.php?id=$id'>$name</a><br>";
		}

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

</body>
</html>