<!DOCTYPE html>
<html>
<head>
	 
</head>
<body>
	<form  method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
    <button type="submit" name="submit">Upload</button>
    
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
	
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed  = array('mp4','ogg','png','jpg','ppt','pptx','pdf','mp3');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
	
			
			move_uploaded_file($fileTmpName, 'resume/'.$fileName);
			$s = "INSERT INTO `agentdoc`(`aid`, `adoc`) VALUES ('1','$fileName')";
			if (mysqli_query($mysqli,$s)) {
				echo "Uploaded";
			}
			

		} else {
			echo "Error";
		}


	} else {
		echo "PLease upload --> video or image or pdf ( mp4/ogg/jpg/png/pdf )<br><br>";
	}
    echo "<br><br>Contents: <br>";
  $p = "SELECT `adoc` FROM `agentdoc` WHERE `aid`=1";

		$query=	mysqli_query($mysqli,$p);
		while ($row=mysqli_fetch_assoc($query)) {
			
	
		$name=$row['adoc'];
		
			
	echo "<a href='watchagent.php?id=$name'>$name</a><br>";
		}

  
}?>

</body>
</html>