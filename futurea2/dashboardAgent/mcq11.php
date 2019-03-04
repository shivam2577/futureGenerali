
<?php

error_reporting(E_ERROR|E_PARSE);

$mysqli = mysqli_connect('localhost', 'root', '','future');

// Check connection
if (mysqli_connect_errno()) {
  echo "failed to connect".mysqli_connect_errno();
   }


?>
<html>
  <head></head>
  <body>
<div class="container">



</div> <br>
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   
   
<?php
  for ($i=1; $i<6 ; $i++) { 
    # code...
  
 $q = "SELECT * FROM questions where qid=$i";
    $query1=  mysqli_query($mysqli,$q);
    while ($rows=mysqli_fetch_assoc($query1)) {
  ?>

  <div class="card">
    <h4 class="card-header"> <?php echo $rows['question'];  ?></h4>
    
   <?php
      
    $q = "SELECT * FROM answers where ans_id=$i";
    $query1=  mysqli_query($mysqli,$q);
    while ($rows=mysqli_fetch_assoc($query1)) {
  ?>

    <div class="card-body">
      <input type="radio" name="quizcheck[<?php echo $rows['ans_id'] ;?>]" value="<?php echo $rows['aid'] ;?>">
      <?php echo $rows['answer'];  ?>


    </div>

    

 

  <?php 
}
}
}
?>
<input class="btn btn-danger" type="submit" name="submit" value="Submit Form"><br>


</form> </div></div>
</form>
<?php
if(isset($_POST['submit'])) 
{ 

  if (!empty($_POST['quizcheck'])) {
        $count = count($_POST['quizcheck']);
        
      
     $result=0;
      $i=1;
      $j=1;
      $z=0;

   $selected=$_POST['quizcheck'];
   //print_r($selected);
    
    $q = "SELECT * FROM questions  ";
    $query1=mysqli_query($mysqli,$q);
    while ($rows=mysqli_fetch_array($query1)) {
       //print_r($rows['ans_id']);
      $checked = $rows['ans_id'] == $selected[$i];

      if ($checked) {
      $result++;
     }else
     {
       
       //echo "<br>".$rows['question']."<br>";
       $compare[$z]=$rows['ans_id'];
       $compare1[$z]=$rows['question'];
       //echo $compare;
       $z++;
     }
       $i++;
   }

echo "-------------------------------------------------------------------------------------------------------------------------------------------------<br>";
?>
  <?php
  echo "Attempted Qs--".$count.".<br>";
  echo "total score : ".$result."<br>";
 
 

    
echo "-------------------------------------------------------------------------------------------------------------------------------------------------<br>";
    $finalresult ="INSERT INTO `user_result`(`username`, `totalques`, `answerscorrect`) VALUES ('sahil','3',$result)" ;
 $queryresult= mysqli_query($mysqli,$finalresult);
     echo "<br><br>Wrong Questions:<br>";
     for ($i=0; $i <$z ; $i++) { 
         echo "<br>Question : ".$compare1[$i];
      $t = "SELECT * FROM answers where aid= $compare[$i] ";
      $query1=mysqli_query($mysqli,$t);
      $rows=mysqli_fetch_assoc($query1);
         echo "<br>Correct Answer : ".$rows['answer']."<br>";
     }
}}?>
</body>
</html>