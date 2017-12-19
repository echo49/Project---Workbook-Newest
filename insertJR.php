<html>
<body>
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

$query="CREATE TABLE IF NOT EXISTS JobPostings (id INT(6) NOT NULL,Email VARCHAR(30) NOT NULL, Jobtitle VARCHAR(30) NOT NULL,JobLocation VARCHAR(25), JobRegion VARCHAR(30) NOT NULL,JobType VARCHAR(30), JobCategory VARCHAR(25) NOT NULL, JobTag VARCHAR(50), Description VARCHAR(50),Appemail VARCHAR(30) NOT NULL, Closedate DATE,CompanyName VARCHAR(20) NOT NULL, Tagline VARCHAR(30),Description2 VARCHAR(50), Twitter VARCHAR(20), Website VARCHAR(30), Gplus VARCHAR(20),FB VARCHAR(20),Linkedin VARCHAR(20), Logo BLOB NOT NULL, PRIMARY KEY(id))";



mysqli_query($con,$query);
  

$JP_email=$_POST['email'];
$JP_title=$_POST['jobtitle'];
$JP_location=$_POST['joblocation'];
$JP_region=$_POST['jobregion'];
$JP_type=$_POST['jobtype'];
$JP_category=$_POST['jobcategory'];
$JP_tag=$_POST['jobtag'];
$JP_description=mysqli_real_escape_string($con, $_POST['description']);
$JP_appemail=$_POST['appemail'];
$JP_closedate=$_POST['closedate'];
$JP_companyname=$_POST['companyname'];
$JP_tagline=$_POST['tagline'];
$JP_description2=mysqli_real_escape_string($con, $_POST['description2']);
$JP_twitter=$_POST['twitter'];
$JP_website=$_POST['website'];
$JP_gplus=$_POST['gplus'];
$JP_fb=$_POST['fb'];
$JP_linkedin=$_POST['linkedin'];
$JP_logo=$_POST['logo'];

$query = "INSERT INTO JobPostings VALUES ('','$JP_email','$JP_title','$JP_location','$JP_region','$JP_type','$JP_category','$JP_tag','$JP_description','$JP_appemail','$JP_closedate','$JP_companyname','$JP_tagline','$JP_description2','$JP_twitter','$JP_website','$JP_gplus','$JP_fb','$JP_linkedin','$JP_logo')";

mysqli_query($con,$query);

mysqli_close($con);

?>
</body>
</html>
