<?php 
require('config/db.php');
require('config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Future_agents</title>
	
	<!-- dependencies imported -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png" type="image/png"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="welcome.css">
	
	<!-- chatbot script -->
	<script type="text/javascript">
    window._chatlio = window._chatlio||[];
    !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline", "page", "open", "showOrHide"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.3");
       n.setAttribute('data-widget-id','082ae86d-6347-44a0-624c-442016347a0a');
       c.parentNode.insertBefore(n,c);
    }();
	</script>
</head>

<body>
	<!-- beginning of header and jumbotron -->

	<div class="jumbotron">
		<nav class="nav-transparent navbar navbar-expand-lg">
		  <a class="navbar-brand" href="index.php"><img  src="img/logo7.png"></a>
		  
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home<!-- <span class="sr-only">(current)</span>--></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="about.html">About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="contact.html">Contact</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="whychooseus.html">Why Choose Us</a>
		      </li>
		<!--       <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#">Disabled</a>
		      </li> -->
		    </ul>
		    	
		    <ul class="navbar-nav ml-auto">
		    	<li class="nav-item" style="padding-right: 10px">
		        
		        

		        <?php if($_SESSION['user_logged_in']): ?>
					<?php if($_SESSION['user_type'] == "aid"): ?>		            
                        <a id="nav-button" href="dashboardAgent/home.php"><button class="btn btn-outline-light text-light" type="submit">Dashboard</button></a>
                    <?php elseif($_SESSION['user_type'] == "sid"): ?>		            
                        <a id="nav-button" href="dashboardSales/home.php"><button class="btn btn-outline-light text-light" type="submit">Dashboard</button></a>
                    <?php elseif($_SESSION['user_type'] == "tid"): ?>		            
                        <a id="nav-button" href="dashboardTraining/index.php"><button class="btn btn-outline-light text-light" type="submit">Dashboard</button></a>
                    <?php else : ?>		            
                        <a id="nav-button" href="dashboardBmanager/index.php"><button class="btn btn-outline-light text-light" type="submit">Dashboard</button></a>
                    <?php endif; ?>
               		<a id="nav-button" href="logout.php"><button class="btn btn-outline-light text-light" type="submit">Logout</button></a>
                        
                <?php else: ?>
                    <a id="nav-button" href="login.html"><button class="btn btn-outline-light text-light" type="submit">Join Us</button></a>
                     
                <?php endif; ?>


		        </li>
		       <!--  <li class="nav-item">
		        <a id="nav-button"><button class="btn btn-outline-light text-light" type="submit">Sign Up</button></a>
		        </li> -->
		    </ul>  
		      
		    
		  </div>
		</nav>
		<div id="heading">
			Welcome To Our Family !
			<h5>Welcome to Future Generali</h5>
			<!-- <center><a href="About.php" class="btn btn-info" id="know-more">KNOW MORE</a>
			</center> -->
		</div>
	</div>

	<div id="section1" style="background-color: #d0d9db">
		<div id="head"><center>There’s a place here for every kind of brilliant.</center></div>
		<div id="content"><center>We love the courageous, the risk takers, the honest and the team players. We value passion, courage and original thinking and we are waiting to meet you!</center></div>

		<!-- <div class="row col-md-6"><img height="300" src="img/astronaut.png"></div> -->
	</div>

<!-- testomonial -->

<center>
	<div class="container-fluid" id="section4">
  <div class="row" style="vertical-align: middle; margin: auto;">


    <div class="col-4">
      <img src="png1.png" >
      <h4><b>Aditya Sarwate</b></h4>
      <p><section>"Becoming an agent at Future Generali changed my life"</section> <section>This venture opened many avenues for me</section></p>
    </div>
    
    <div class="col-4">
      <img src="png2.png">
      <h4><b>Satyam Sandikar</b></h4>
      <p><section>Daily commute. Errand across town. Early </section> <section>morning flight. Late night drinks.</section><section> Wherever you’re headed, count on LYFT</section><section> for a ride—no reservations required.</section></p>
    </div>
    
    <div class="col-4">
      <img src="png3.png">
      <h4><b>Shewta Sehgal</b></h4>
       <p><section>Economy cars at everyday prices are </section> <section>always available. For special occasions, no </section><section> occasion at all, or when you just a need a </section><section> bit more room, call a black car or SUV.</section></p>
    </div>

 </div>
</div>
</center>
<br>
	<div  class="container-fluid" id="section2">
		<div class="container"><div class="row row-centered"><div class="col-centered offset-md-3"><h1 style="margin-bottom: 20px">Our Human Resources Philosophy</h1></div></div></div>
		<div class="container"><div class="row"><div class="col-md-3"></div><div class="col-md-6"><div class="row row-centered"><div class="col-md-4 offset-md-4 col-centered"><h3 class="community">Attracting Talent</h3><p>We focus on attracting and retaining the best talent from India and overseas</p></div></div></div><div class="col-md-3"></div></div><div class="row"><div class="col-md-3"><h3 class="promise">Benchmarking Processes</h3><p>We benchmark our processes and practices to be best-in-class across the industry.</p><br><br><h3 class="community">Refining Potential</h3><p>We value our people and believe in investing in them, supporting their goals as we refine their potential, and provide them with a platform to excel and grow with us.</p></div><div class="col-md-6 "><img src="img/philosophy.png" alt="" class="img-responsive center-block"></div><div class="col-md-3"><h3 class="people">Rewarding Performance</h3><p>We foster a leadership mindset that embraces meritocracy as a vital force to reward performance and desired behaviour.</p><br><br><h3 class="open">Acknowledging the Competitive Edge</h3><p>We recognise that the only real source of sustainable competitive advantage for an organisation is the power of its human resources.</p></div></div></div>
	</div>

	<footer class="container-fluid" id="section3">
		<div class="container row">

			<div class="col-md-4">
				<center>
					<ul style="color: #DFDFDF;text-align: left;">
						<li>Benefits</li>
						<li>About</li>
						<li>Contact Us</li>
						<li>Company Culture</li>
					</ul>
				</center>
			</div>

			<div class="col-md-4"  >
				<center>
					<ul style="color: #E6E6E6;text-align: left;">
						<li>Future Generali India Insurance Co Ltd.,<br>Indiabulls Finance Centre,<br>6th Floor, Tower 3, Senapati Bapat Marg,<br>Elphinstone Road, Prabhadevi (W),<br>Mumbai - 400 013. <br>IRDAI Registration No: 132<br>(Validity 31 March 2019)<br>License Category: General<br>CIN: U66030MH2006PLC165287
						</li>
					</ul>
				</center>
			</div>

			<div class="col-md-4">
				<center>
					<ul style="color: #E6E6E6;text-align: left;">
						<li>Follow Us:<br><br>
							<a href="https://www.facebook.com/FutureGenerali" style="padding: 5px;"><img src="img/social/facebook.png"></a>
							<a href="https://www.linkedin.com/company/future-generali" style="padding: 5px;"><img src="img/social/linkedin.png"></a>
							<a href="https://twitter.com/Future_Generali" style="padding: 5px;"><img src="img/social/twitter.png"></a>
							<a href="https://www.youtube.com/user/FutureGeneraliLtd" style="padding: 5px;"><img src="img/social/youtube.png"></a>
							<a href="https://www.instagram.com/futuregenerali" style="padding: 5px;"><img src="img/social/instagram.png"></a>
						</li>
					</ul>
				</center>
			</div>
		</div>
		<div style="display: block;margin-bottom: 0;margin-top: 50px;padding-bottom: 0;color: #E6E6E6"><center>&copy;404-Found | siteworks</center>
		</div>
	</footer>



	<script type="text/javascript">
		$(document).ready(function(){
			$(window).scroll(function(){
				var scroll = $(window).scrollTop()
				if(scroll > 200){
					$("nav").removeClass('nav-transparent')	
					$("#nav-button>button").removeClass('btn-outline-light text-light')
					$("#nav-button>button").addClass('btn-dark text-light')
					$("nav").addClass('nav-opaque navbar-light bg-light',2000,"swing")
				}
				else{
					$("#nav-button>button").removeClass('btn-dark text-light')
					$("#nav-button>button").addClass('btn-outline-light text-light')			
					$("nav").removeClass('nav-opaque navbar-light bg-light')
					$("nav").addClass('nav-transparent')	
				}

			})
		})
	</script>
	
</body>
</html>