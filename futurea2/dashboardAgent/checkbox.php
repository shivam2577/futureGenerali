<?php
error_reporting(E_ERROR|E_PARSE);
$mysqli = mysqli_connect('localhost', 'root', '','future');


if (mysqli_connect_errno()) {
  echo "failed to connect".mysqli_connect_errno();

}
   
?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Droid+Serif);
div.container{
width: 960px;
height: 610px;
margin:50px auto;
font-family: 'Droid Serif', serif;
}
div.main{
width: 308px;
margin-top: 35px;
float:left;
border-radius: 5px;
Border:2px solid #999900;
padding:0px 50px 20px;
}
p{
margin-top: 5px;
margin-bottom: 5px;
color:green;
font-weight: bold;
}
h2{
background-color: #FEFFED;
padding: 25px;
margin: 0 -50px;
text-align: center;
border-radius: 5px 5px 0 0;
}
hr{
margin: 0 -50px;
border: 0;
border-bottom: 1px solid #ccc;
margin-bottom:25px;
}
span{
font-size:13.5px;
}
label{
color: #464646;
text-shadow: 0 1px 0 #fff;
font-size: 14px;
font-weight: bold;
}
.heading{
font-size: 17px;
}
b{
color:red;
}
input[type=checkbox]{
margin-bottom:10px;
margin-right: 10px;
}
input[type=submit]{
padding: 10px;
text-align: center;
font-size: 18px;
background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
border: 2px solid #e5a900;
color: #ffffff;
font-weight: bold;
cursor: pointer;
text-shadow: 0px 1px 0px #13506D;
width: 100%;
border-radius: 5px;
margin-bottom: 15px;
}
input[type=submit]:hover{
background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
}
</style>

</head>
<body>
<div class="container">
<div class="main">
<h2>Agent FollowUp Report</h2>

<form  method="post">
	<?php 
	$p = "SELECT  `ARF`, `ic38`, `adocument`, `apayment` FROM `agentstatus` WHERE `aid`=31";
    $query= mysqli_query($mysqli,$p);
    while ($row=mysqli_fetch_assoc($query)) {
    	 $contact1=$row['ARF'];
    	 $contact2=$row['ic38'];
    	 $contact3=$row['adocument'];
    	 $contact4=$row['apayment'];
    	}
    	
if ($contact1==0) {
?>
<input type="checkbox" name="check_list[]" value="ARF Form"><label>ARF Form</label>
<?php echo "<br>";  
}
if ($contact3==0) {
?>
<input type="checkbox" name="check_list[]" value="Documents"><label>Documents</label>
<?php echo "<br>";  }
if ($contact2==0) {
?>
<input type="checkbox" name="check_list[]" value="IC38 certificate"><label>IC38 certificate</label>
<?php echo "<br>";  }
if ($contact4==0) {
?>
<input type="checkbox" name="check_list[]" value="Payment(ic38)"><label>Payment(ic38)</label>
<?php  }?>
<input type="submit" name="submit" Value="Submit"/>
<!----- Including PHP Script ----->
<?php 
	if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {

$checked_count = count($_POST['check_list']);
echo "You have selected following ".$checked_count." option(s): <br/>";

foreach($_POST['check_list'] as $selected) {


	$arf[]=$selected;
	
echo "<p>".$selected ."</p>";
}

    if ($arf[0]=='ARF Form' OR $arf[1]=='ARF Form' OR $arf[2]=='ARF Form' OR $arf[3]=='ARF Form') {
    $p = "UPDATE `agentstatus` SET `ARF`=1 WHERE `aid`=1";
    $query= mysqli_query($mysqli,$p);
	}

	if ($arf[0]=='IC38 certificate' OR $arf[1]=='IC38 certificate' OR $arf[2]=='IC38 certificate' OR $arf[3]=='IC38 certificate') {
	$p = "UPDATE `agentstatus` SET `ic38`=1 WHERE `aid`=1";
    $query= mysqli_query($mysqli,$p);}

    if ($arf[0]=='Documents'OR $arf[1]=='Documents' OR $arf[2]=='Documents' OR $arf[3]=='Documents' ) {
    $p = "UPDATE `agentstatus` SET `adocument`=1 WHERE `aid`=1";
    $query= mysqli_query($mysqli,$p);}

    if ($arf[0]=='Payment(ic38)' OR $arf[1]=='Payment(ic38)' OR $arf[2]=='Payment(ic38)' OR $arf[3]=='Payment(ic38)') {
    $p = "UPDATE `agentstatus` SET `apayment`=1 WHERE `aid`=1";
    $query= mysqli_query($mysqli,$p);}


}

}
?>
</form>
</div>
</div>
</body>
</html>