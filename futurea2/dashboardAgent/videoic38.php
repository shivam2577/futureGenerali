<?php
$mysqli = mysqli_connect('localhost', 'root', '','future');

// Check connection
if (mysqli_connect_errno()) {
	echo "failed to connect".mysqli_connect_errno();
   }


    $r = "SELECT `mid`,`mname` FROM `media` where `mtype`='ic38' ";
    $query1=mysqli_query($mysqli,$r);
    while ($row=mysqli_fetch_assoc($query1)) {
		
		$name=$row['mname'];
		$fileExt = explode('.', $name);
	    $fileActualExt = strtolower(end($fileExt));

	$allowed  = array('mp4','ogg','mp3');
	$allowed1  = array('png','jpg');
	$allowed2  = array('pdf');
	$allowed3  = array('ppt','pptx');

	if (in_array($fileActualExt, $allowed)) {




		echo "<video width='400' height ='200' controls><source src = '../dashboardTraining/uploads/".$name."' type = 'video/mp4'><source src = '../dashboardTraining/uploads/".$name."' type = 'video/ogg'></video><br>";

    }
    if (in_array($fileActualExt, $allowed1)) {


		echo "<img src ='../dashboardTraining/uploads/".$name."' width='400' height='400'>";


	}
		
		
	}

?>
