<?php 

require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();
$bbranch=$_SESSION['bbranch'];
?>  



<!DOCTYPE html>
<html>
<head>
	<title>Future_agents</title>
	<?php require_once '../boilerplate.php';?>
	<link rel="stylesheet" href="style.css">

	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <title>USER</title>

  <style>

    .textCenter{
      text-align: center;
       min-width:300px;
    }


    #main {
      transition: margin-left .5s;
      padding-top: 50px;
    }


#myInput {
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
       }

  </style>

</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 6px 6px 0 rgba(0,0,0,0.4), 0 0 0 2px rgba(0,0,0,0.08);position: fixed;width: 100%;z-index: 1"> 
		<a class="navbar-brand" href="../index.php"><img  src="../img/logo7.png"></a>
		  
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		    	<li class="nav-item active">
		        	<a class="nav-link" href="home.php">Assign<!-- <span class="sr-only">(current)</span>--></a>
		      	</li>
		      	<!-- <li class="nav-item">
		        	<a class="nav-link" href="profile.php">Profile</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="IC38.php">IC38</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="practice.php">Practice</a>
		      	</li>		      
		      	<li class="nav-item">
		        	<a class="nav-link" href="training.php">Training</a>
		    	</li> -->

		  	</ul>	
			
			<?php if($_SESSION['user_logged_in']): ?>
      <form class="form-inline ml-auto">
          <a href="../logout.php" class="btn btn-danger" style="color:white">Logout</a>
        </form>
        <?php else: ?>
      <form class="form-inline ml-auto">
          <a href="../blogin/login.php" class="btn btn-danger" style="color:white">Login</a>
        </form>
    <?php endif;?>
		</div>
	</nav>
	
<!-- 	<div class="container-fluid row">
		<nav class="col-md-2 d-none d-md-block bg-dark sidebar" style="top: 0px;height: calc(100vh - 0px);padding-top: 100px;position: fixed;z-index: -1">
        	<div class="sidebar-sticky">
          		<h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Dashboard</h4>

            	<ul class="nav flex-column">
        			<li class="nav-item">
		    	    	<a class="nav-link active" href="home.php">Home</a>
			    	</li>
		      		<li class="nav-item ">
		        		<a class="nav-link " href="profile.php">Profile</a>
		      		</li>
		      		<li class="nav-item">
		      		  	<a class="nav-link" href="IC38.php">IC38</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="practice.php">Practice</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="training.php">Training</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="../logout.php">Log Out</a>
		      		</li>
	            </ul>
            	<ul class="nav flex-column" style="text-align: center; padding-top: 50px">
            		<li class="nav-item">
		        		<img src="../img/dashboard/user.png">
		      		</li>
		      		<li class="nav-item">
		      			<span style="color: white">name</span>
		      		</li>
            	</ul>     
          	</div>
        </nav> -->

<!-- main -->
<div id="main" style="padding:40px" >
<br>
<br>
<br>
<h4>Sales Manager Details...</h4>
<br>
<br>

<div class="row" style="">
  <div class="col-10">
    <input type="text" id="myInput"  placeholder="Enter Name...">
  </div>
  <div class="col-2">
    <button id="search" type="button" class="btn btn-primary" style="background:black;width:100%;font-size: 20px;height:50px">Search</button>
  </div>
</div>


<!--card-->  
<br>
  <div id="smanager" class="card" style="width:50%;margin:0 auto;display:none">
  <div class="card-body">
    <p id="close" align="right" style="color:black;font-size:20px;margin-top:-20px;cursor: pointer;"><b>&#10005;</b></p>
    <h4 id="sname"class="card-title" ><b></b></h4>
    <p id="scontact" class="card-text"></p>
    <hr>
    <input type="number" id="assignedphno" placeholder="Enter agent PhoneNumber to assign" >
    <br>
    <br>
    <button id="assign" type="button" class="btn btn-primary" style="background:black;width:100%;font-size: 16px">ASSIGN MANAGER</button>
  </div>
</div>

<h1 id="notFound"class="display-4" align="center" style="display:none">No Data Found</h1>
<h1 id="assigned"class="display-4" align="center" style="display:none">Assigned!!</h1>

<center> 
<br>
<div class="table-responsive" align="center" style="max-height:320px">
<table id="table"class="table table-hover" align="center"style="width:100%;">
  <thead class="thead-dark">
    <tr>
      <th>Manager Name</th>
      <th>Phone Number</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</div>
</center>
<br>
</div>

<!-- <script>
  var input = document.getElementById("myInput");
  input.addEventListener("keyup", function(event) {
      event.preventDefault();
      if (event.keyCode === 13) {
          document.getElementById("search").click();
      }
  });
</script> -->

<script>
  var search = document.getElementById("search");
  var assign = document.getElementById("assign");
  var smanager = document.getElementById("smanager");
  var assigned = document.getElementById("assigned");
  var close=document.getElementById("close");
  var managerTable=document.getElementById("table").getElementsByTagName('tbody')[0];
  var managerTable1=document.getElementById("table");
  var notFound=document.getElementById("notFound");
  var sid;
  
  //home
  var ajax= new XMLHttpRequest();
  var method = "POST";
  var url="getsm.php";
  var asynchronous=true;
  ajax.open(method,url,asynchronous);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send();
  ajax.onreadystatechange= function(){
    if(this.readyState == 4 && this.status == 200){
        
        try{
          var data =JSON.parse(this.responseText);
          
        }catch(err){
          alert(this.responseText);
        }
        
        updateTable(data);
    }
  }

  function updateTable(data){
    for(let i=0;i<data.length;i++){
      var row = managerTable.insertRow(0);
      var sname = row.insertCell(0);
      var scontact = row.insertCell(1);
      sname.innerHTML = data[i].sname;
      scontact.innerHTML = data[i].scontact;
    }
    
  }

  close.addEventListener("click",function(){
    smanager.style.display="none";
    managerTable1.style.display="table";
  });


//card
 search.addEventListener("click",function(){
    notFound.style.display="none";
    smanager.style.display="none";
    assigned.style.display="none";
    managerTable1.style.display="none";
    var ajax= new XMLHttpRequest();
    var sname=document.getElementById("myInput").value;
    var method = "POST";
    var url="getsm.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("sname="+sname);
    ajax.onreadystatechange= function(){
      if(this.readyState == 4 && this.status == 200){
      //  alert(this.responseText);
                 

        try{
          var data=JSON.parse(this.responseText);
          document.getElementById("sname").innerHTML=data[0];
          document.getElementById("scontact").innerHTML=data[1];
          // document.getElementById("slocation").innerHTML=data[3];
          // document.getElementById("sbranch").innerHTML=data[4];
          
          sid=data[5];
          //scontact=data[1];
          smanager.style.display="block";
        }catch(err){
          notFound.style.display="block";
          managerTable1.style.display="table";
        }

      }
    }
  });


//assign
  assign.addEventListener("click",function(){
    var assignedphno = document.getElementById("assignedphno").value;
    var ajax= new XMLHttpRequest();
    var method = "POST";
    var url="assignagent.php";
    var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("assignedphno="+assignedphno+"&sid="+sid);
    assigned.style.display="block";
    smanager.style.display="none";
    managerTable1.style.display="table";
  });

</script>
<!-- Script For The SideBar -->
<!-- <script>
  //SideBar Code Here
  var open=1;
    function openNav() {
      if(open==1){
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      open=0;
    }else if(open==0){
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      open=1;
    }

  }

</script> -->

        <!-- <div class="container" style="margin-left: 300px">
	        <div class="col-md-12" style="margin-top:50px;padding: 30px;margin-left:0">
				<div style="font-weight: lighter;font-size: 5.5vw;">MCQs</div>
				<hr>
				<div class="container col-md-12">
					<?php require_once 'mcq11.php';?>
				</div>
			</div>
		</div> -->

	</div>
</body>
</html>