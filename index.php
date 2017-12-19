<?php	
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workbook</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap -->

	<!-- Main Style -->
    <link href="style.css" rel="stylesheet">
	<!-- Main Style -->

	<!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href='font-awesome/css/font-awesome.min.css' rel="stylesheet" type="text/css">
	<!-- fonts -->

	<!-- Owl Carousel -->
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/owl.transitions.css" rel="stylesheet">

	<!-- Owl Carousel -->

	<!-- Form Slider -->
	<link rel="stylesheet" href="css/jslider.css" type="text/css">
	<link rel="stylesheet" href="css/jslider.round.css" type="text/css">
	<!-- Form Slider -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	</head>
  <body>

		<div id="header"><!-- start main header -->
			<div class="top-line">&nbsp;</div>
			<div class="container"><!-- container -->
				<div class="row">
					<div class="col-md-3"><!-- logo -->
						<a href="index.php" title="Workbook" rel="home">
							<img class="main-logo" src="images/logo.png" alt="Workbook" />
						</a>
					</div><!-- logo -->
					<div class="col-sm-9 main-nav"><!-- Main Navigation -->
						<a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-bars fa-2x"></i></a>
						<nav>
							<ul class="menu">
								<li><a href="index.php" >HOME</a> </li>
								<li><a href="registerEE.php"  >Employee </a></li>
								<li><a href="registerEY.php"  >Employer </a></li>
								<li><a  href="post-job.php"  >Post A Job</a></li>
								<li><a  href="post-resume.php" >Post A Resume</a></li>									
								<?php	
								if(isset($_SESSION['myemail']))
								{
								echo "<li><a href=\"Myprofile.php\" >".$_SESSION['myemail']."</a></li> ";
								echo "<li><a href=\"Logout.php\" >Log out</a></li> ";
								}
								else
								{
								echo "<li><a href=\"signin.php\" >Login</a></li>";								
								}
								?>								
							</ul>		
						</nav>
					</div><!-- Main Navigation -->

					<div class="clearfix"></div>
				</div>
			</div><!-- container -->
		</div><!-- end main header -->
  <div id="wrapper"><!-- start main wrapper -->
	
		<div class="container">
			<div class="panel panel-success">
				<div class="panel-body">
					<form class="form-register" name="searchform" method="post" action="searchResult.php"> 	
						<div class="col-md-12 form-group group-1">
						<label for="keywords" class="label">Key Words</label>
						<input type="text" id="keywords" name="keywords" class="input-job" placeholder="Big Data, Data Analyst, Data Scientist, DBA...">
						</div>
					
						<div class="col-md-12 form-group group-2">
						<label for="searchplace" class="label">Location</label>
						<input type="text" id="searchplace" name="searchplace" class="input-location" placeholder="Hartford, New York City, Boston...">
						</div>							
					
						<div class="form-group">
							<label for="searchtspan">In</label>
							<select class="form-control" id="searchtspan" name="searchtspan" placeholder="Within" />
								<option value="1">7 Days</option>
								<option value="2">2 weeks</option>
								<option value="3">1 Month</option>
								<option value="4">6 Months</option>
								<option value="4">1 year</option>\		
							</select>
						</div>
					
						<div class="form-group">
							<button type="submit" class="btn btn-default btn-green"> <span class="glyphicon glyphicon-search"></span> Search</button>
						</div>

					</form>
				</div>
			</div>
		</div><!-- end job finder -->
		
		<div class="recent-job"><!-- Start Job -->
			<div class="container">
				<h4><i class="glyphicon glyphicon-envelope"></i> Job Openings</h4>
				<div id="tab-container" class='tab-container'><!-- Start Tabs -->
					<ul class='etabs clearfix'>
						<li class='tab'><a href="#all">Page</a></li>
					</ul>

					<div class='panel-container'>
						<div id="all"><!-- Tabs section 1 -->
						
<?php	
$host='localhost';
$user='root';
$password='';
$database='workbook';

$con=mysqli_connect($host,$user,$password,$database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	
  
 $query= "SELECT * FROM jobpostings";
 $result=mysqli_query($con,$query)or die(mysqli_error($con));
 $count=mysqli_num_rows($result);
 if ($count > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
echo "					<form class=\"form-register\" name=\"searchform\" method=\"post\" action=\"job-detail.php\"> \n"; 	        				
echo "                          <div class=\"recent-job-list\"><!-- Tabs content -->\n";
echo "								<div class=\"col-md-1 job-list-logo\">\n";
echo "									<img src=\"images/upload/dummy-job-open-2.png\" class=\"img-responsive\" alt=\"logo\" />\n";
echo "								</div>\n";
echo "								<div class=\"col-md-5 job-list-desc\">\n";
echo "									<h6> ".$row["Jobtitle"]."</h6>\n";
echo "								</div>\n";
echo "                                \n";
echo "								<div class=\"col-md-3 job-list-location\">\n";
echo "									<h6><i class=\"fa fa-map-marker\"></i>".$row["JobLocation"]."</h6>\n";
echo "								</div>\n";
echo "								<div class=\"col-md-3\">\n";
echo "									<div class=\"row\">\n";
echo "										<div class=\"col-md-7 job-list-type\">\n";
echo "											<h6><i class=\"fa fa-clock-o\"></i>".$row["PostedDate"]."</h6>\n";
echo "										</div>\n";
echo "										<div class=\"col-md-5 job-list-button\">\n";
echo "											<button class=\"btn-view-job\" type=\"submit\" name=\"btnviewjob\" value=".$row["id"]." >More Detail</button>\n";
echo "										</div>\n";
echo "									</div>\n";
echo "								</div>\n";
echo "								<div class=\"clearfix\"></div>\n";
echo "							</div><!-- Tabs content -->";
echo "					</form>";
}
 }else {
     echo "0 results";
}
$con->close();
?>
	<ul class="pagination">
		<li class="active"> <a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
	</ul>				
			</div>
		</div><!-- end Job -->
		
		</div>

		
		
		
			<div class="container">
				
				<h1>Employers</h1>					
				<div id="company-post-list" class="owl-carousel company-post">
					<div class="company">
						<img src="images/upload/company-1.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-2.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-3.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-4.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-5.png" class="img-responsive" alt="company-post" />
					</div>
					
					<div class="company">
						<img src="images/upload/company-1.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-2.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-3.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-4.png" class="img-responsive" alt="company-post" />
					</div>
					<div class="company">
						<img src="images/upload/company-5.png" class="img-responsive" alt="company-post" />
					</div>
					
				</div>
			</div>

<h1>Analytics</h1>					
							
<?php
 /*
     Example2 : A cubic curve graph
 */

 // Standard inclusions   
 include("pChart/pData.class");
 include("pChart/pChart.class");

 // Dataset definition 
 $DataSet = new pData;
 $DataSet->AddPoint(array(1,4,3,4,3,3,2,1,0,7,4,3,2,3,3,5,1,0,7),"Serie1");
 $DataSet->AddPoint(array(1,4,2,6,2,3,0,1,5,1,2,4,5,2,1,0,6,4,2),"Serie2");
 $DataSet->AddAllSeries();
 $DataSet->SetAbsciseLabelSerie();
 $DataSet->SetSerieName("Data Scientist Jobs Trend","Serie1");
 $DataSet->SetSerieName("Deep Learning Jobs Trend","Serie2");

 // Initialise the graph
 $Test = new pChart(1800,700);
 $Test->setFixedScale(0,8);
 $Test->setFontProperties("Fonts/tahoma.ttf",10);
 $Test->setGraphArea(50,50,1750,650);
 $Test->drawGraphArea(255,255,255,TRUE);
 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,255,255,0,TRUE,0,2);

 // Draw the 0 line
 $Test->setFontProperties("Fonts/tahoma.ttf",10);
 $Test->drawTreshold(0,143,55,72,TRUE,TRUE);

 // Draw the cubic curve graph
 $Test->drawCubicCurve($DataSet->GetData(),$DataSet->GetDataDescription());

 // Finish the graph
 $Test->setFontProperties("Fonts/tahoma.ttf",10);
 $Test->drawLegend(750,50,$DataSet->GetDataDescription(),255,255,0);
 $Test->setFontProperties("Fonts/tahoma.ttf",10);
 $Test->Render("pChart/example2.jpg");
?>

			<div class="main-slider"><!-- start main-headline section -->
				<div class="slider-nav">
					<a class="slider-prev"><i class="fa fa-chevron-circle-left"></i></a>
					<a class="slider-next"><i class="fa fa-chevron-circle-right"></i></a>
				</div>
				<div id="home-slider" class="owl-carousel owl-theme">
					<div class="item-slide">
						<img src="pChart/example2.jpg" class="img-responsive" alt="dummy-slide" />
					</div>
					<div class="item-slide">
						<img src="pChart/example2.jpg" class="img-responsive" alt="dummy-slide" />
					</div>
				</div>
			</div><!-- end main-headline section -->

		
		
				<div class="footer-credits"><!-- Footer credits -->
					2017 &copy; CCSU Liyuan Qin All Rights Reserved.
				</div><!-- Footer credits -->
				
	</div><!-- end main wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Tabs -->
	<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>
	<script src="js/modernizr.custom.49511.js"></script>
	<!-- Tabs -->

	<!-- Owl Carousel -->
	<script src="js/owl.carousel.js"></script>
	<!-- Owl Carousel -->

	<!-- Form Slider -->
	<script type="text/javascript" src="js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="js/tmpl.js"></script>
	<script type="text/javascript" src="js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="js/draggable-0.1.js"></script>
	<script type="text/javascript" src="js/jquery.slider.js"></script>
	<!-- Form Slider -->
	
	<!-- Map -->
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<!-- Map -->

	<script src="js/workbook.js"></script>

  </body>
</html>