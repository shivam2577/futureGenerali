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

	if (in_array($fileActualExt, $allowed2)) {




		echo "<a href='../dashboardTraining/uploads/".$name."' style='text-decoration:none'>" ;
		echo $name. '------------------------ > ';
		echo "</a>";
		echo "<a style='text-decoration:none' download='".$name."' href='../dashboardTraining/uploads/".$name."'>" ;
		echo "DOWNLOAD <br>";
		echo "</a>";

    }
    if (in_array($fileActualExt, $allowed3)) {


		echo "<a style='text-decoration:none' download='<br><?php echo $name ?>' href='uploads/".$name ."?>'>";
		echo "download ppt"; 
		echo "</a>";


	}
		
		
	}
		
    //echo $name."<br><br>";

    
     
?>
