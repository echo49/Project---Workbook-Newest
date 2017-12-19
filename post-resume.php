<?php	session_start();?><!DOCTYPE html><html lang="en">  <head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1">    <title>WORKBOOK</title>    <!-- Bootstrap -->    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">	<!-- Bootstrap -->	<!-- Main Style -->    <link href="style.css" rel="stylesheet">	<!-- Main Style -->	<!-- fonts -->    <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>	<link href='font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css">	<!-- fonts -->	<!-- Owl Carousel -->	<link href="css/owl.carousel.css" rel="stylesheet">    <link href="css/owl.theme.css" rel="stylesheet">	<link href="css/owl.transitions.css" rel="stylesheet">	<!-- Owl Carousel -->	<!-- Form Slider -->	<link rel="stylesheet" href="css/jslider.css" type="text/css">	<link rel="stylesheet" href="css/jslider.round.css" type="text/css">	<!-- Form Slider -->    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    <!--[if lt IE 9]>      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>    <![endif]-->  </head>  <body>    	<div id="wrapper"><!-- start main wrapper -->		<div id="header"><!-- start main header -->			<div class="top-line">&nbsp;</div>			<div class="container"><!-- container -->				<div class="row">					<div class="col-md-3"><!-- logo -->						<a href="index.php" title="Workbook" rel="home">							<img class="main-logo" src="images/logo.png" alt="Workbook" />						</a>					</div><!-- logo -->					<div class="col-sm-9 main-nav"><!-- Main Navigation -->						<a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-bars fa-2x"></i></a>						<nav>							<ul class="menu">								<li><a href="index.php" >HOME</a> </li>								<li><a href="registerEE.php"  >Employee </a></li>								<li><a href="registerEY.php"  >Employer </a></li>								<li><a  href="post-job.php"  >Post A Job</a></li>								<li><a  href="post-resume.php" >Post A Resume</a></li>																								<?php									if(isset($_SESSION['myemail']))								{								echo "<li><a href=\"Myprofile.php\" >".$_SESSION['myemail']."</a></li> ";								echo "<li><a href=\"Logout.php\" >Log out</a></li> ";								}								else								{								echo "<li><a href=\"signin.php\" >Login</a></li>";																}								?>																						</ul>						</nav>					</div><!-- Main Navigation -->					<div class="clearfix"></div>				</div>			</div><!-- container -->		</div><!-- end main header -->				<div class="main-page-title"><!-- start main page title -->			<div class="container">				<div class="post-resume-page-title">Post a Resume</div>							</div>		</div><!-- end main page title -->		<div class="container">		<div class="spacer-1">&nbsp;</div>			<div class="row">				<div class="col-md-8">					<form role="form" class="post-resume-form" enctype="multipart/form-data"   method="post" action="insertRP.php">						<div class="form-group">							<label for="ename">Your Name</label>							<input type="text" class="form-control input" id="name"  name="ename"/>						</div>						<div class="form-group">							<label for="email">Your Email</label>							<input name="email" id="email" type="text" autofocustype="email" class="form-control input-form"  />						</div>						<div class="form-group">							<label for="location">Location</label>							<select class="form-control" id="location"name="location" >								<option >NewYork</option>								<option >Connecticut</option>								<option >Maryland</option>								<option >California</option>								<option >Florida</option>							</select>						</div>												                   						<div class="form-group">							<label for="photo">Photo <span>(Optional)</span> <small>Max. file size: 8 MB.</small></label>							<div class="upload">							    <input type="hidden" name="size" value="350000"/>								<input type="file" id="photo"name="photo" >	           							</div>						</div>                          						<div class="form-group">							<label for="resumecontent">Resume Content</label>							<textarea class="form-control textarea" id="resumecontent"name="resumecontent" ></textarea>						</div>						<div class="form-group">							<label for="skill">Skills <span>(Optional)</span></label>							<input type="text" class="form-control input" id="skill" name="skill">						</div>                          						<div class="form-group">							<label for="resumefile">Resume Files <span>(Optional)</span> <small> Optionally upload your resume for employers to view.</small></label>							<div class="upload">								<input type="file" id="resumefile" name="resumefile"/>															</div>													</div>						<div class="form-group">							<button class="btn btn-default btn-green" type="submit" value="POST A RESUME">POST A RESUME</button>						</div>					</form>					<div class="spacer-2">&nbsp;</div>				</div>				<div class="col-md-4">					<div class="job-side-wrap">								<?php									if(isset($_SESSION['myemail']))								{								echo "<p class=\"centering\"><a class=\"btn btn-default btn-blue\" href=\"Myprofile.php\" >".$_SESSION['myemail']."</a></p> ";								echo "<p class=\"centering\"><a class=\"btn btn-default btn-blue\" href=\"Logout.php\" >Log out</a></p> ";								}								else								{									echo "<h4>Already A Member? Log in Here.</h4>" ;									echo "<p class=\"centering\"><a class=\"btn btn-default btn-green\" href =\"signin.php\" >Log In</a></p>";								}								?>												</div>					<div class="job-side-wrap">						<h4>New On WorkBook</h4>						<p class="centering"> <a class="btn btn-default btn-green" href ="registerEE.php" >Register as an Employee</a></p>					</div>					<div class="job-side-wrap">						<h4>Post Job Now</h4>						<p class="centering"><a class="btn btn-default btn-green" href ="post-job.php">Post a Position</a></p>					</div>				</div>			</div>					</div>	</div><!-- end main wrapper -->    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>    <!-- Include all compiled plugins (below), or include individual files as needed -->    <script src="bootstrap/js/bootstrap.min.js"></script>	<!-- Tabs -->	<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>	<script src="js/modernizr.custom.49511.js"></script>	<!-- Tabs -->	<!-- Owl Carousel -->	<script src="js/owl.carousel.js"></script>	<!-- Owl Carousel -->	<!-- Form Slider -->	<script type="text/javascript" src="js/jshashtable-2.1_src.js"></script>	<script type="text/javascript" src="js/jquery.numberformatter-1.2.3.js"></script>	<script type="text/javascript" src="js/tmpl.js"></script>	<script type="text/javascript" src="js/jquery.dependClass-0.1.js"></script>	<script type="text/javascript" src="js/draggable-0.1.js"></script>	<script type="text/javascript" src="js/jquery.slider.js"></script>	<!-- Form Slider -->		<!-- Map -->	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>	<!-- Map -->	<script src="js/workbook.js"></script>  </body></html>