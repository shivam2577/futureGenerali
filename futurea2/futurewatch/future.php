<!DOCTYPE html>
<html>
<head>
	<title>Future_agents</title>
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
	
			//$fileDestination = 'uploads'.$fileName;
			move_uploaded_file($fileTmpName, 'uploads/'.$fileName);
			$s = "INSERT INTO `video`(`id`, `name`) VALUES ('','$fileName')";
			if (mysqli_query($mysqli,$s)) {
				echo "Uploaded";
			}
			

		} else {
			echo "Error";
		}


	} else {
		echo "PLease upload --> video or image or pdf ( mp4/ogg/jpg/png/pdf )";
	}

  $p = "SELECT `id`, `name` FROM `video` WHERE 1";

		$query=	mysqli_query($mysqli,$p);
		while ($row=mysqli_fetch_assoc($query)) {
		$id=$row['id'];
		$name=$row['name'];
	echo "<a href='watch.php?id=$id'>$name</a><br>";
		}

  
}?>

</body>
</html>