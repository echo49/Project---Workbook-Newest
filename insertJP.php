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

$query="CREATE TABLE IF NOT EXISTS JobPostings (id INT(6) NOT NULL auto_increment,Email VARCHAR(30) NOT NULL, Jobtitle VARCHAR(30) NOT NULL,JobLocation VARCHAR(25), JobRegion VARCHAR(30) NOT NULL,JobType VARCHAR(30), JobCategory VARCHAR(25) NOT NULL, JobTag VARCHAR(50), Description VARCHAR(50),Appemail VARCHAR(30) NOT NULL, Closedate DATE,CompanyName VARCHAR(20) NOT NULL, Tagline VARCHAR(30),Description2 VARCHAR(50), Twitter VARCHAR(20), Website VARCHAR(30), Gplus VARCHAR(20),FB VARCHAR(20),Linkedin VARCHAR(20), Logo BLOB NOT NULL, PRIMARY KEY(id))";



mysqli_query($con,$query);

$target = "upload/";
$target1 = $target . basename( $_FILES['logo']['name']); 

$JP_email=$_POST['email'];
$JP_title=$_POST['jobtitle'];
$JP_location=$_POST['joblocation'];
$JP_summary=mysqli_real_escape_string($con, $_POST['jobsummary']);
$JP_posteddate=$_POST['posteddate'];
$JP_companyname=$_POST['companyname'];
$JP_companyprofile=mysqli_real_escape_string($con, $_POST['companyprofile']);
$JP_logo=$_FILES['logo']['name'];

#$JP_region=$_POST['jobregion'];
#$JP_type=$_POST['jobtype'];
#$JP_category=$_POST['jobcategory'];
#$JP_tag=$_POST['jobtag'];
#$JP_appemail=$_POST['appemail'];
#$JP_tagline=$_POST['tagline'];
#$JP_twitter=$_POST['twitter'];
#$JP_website=$_POST['website'];
#$JP_gplus=$_POST['gplus'];
#$JP_fb=$_POST['fb'];
#$JP_linkedin=$_POST['linkedin'];

$query = "INSERT INTO JobPostings VALUES ('','$JP_email','$JP_title','$JP_location','$JP_summary','$JP_posteddate','$JP_companyname','$JP_companyprofile','$JP_logo')";

mysqli_query($con,$query);

if(move_uploaded_file($_FILES['logo']['tmp_name'], $target1))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['logo']['name']). " has been uploaded, and your information has been added to the directory";
}
else{echo "no logo file uploaded.";
};
mysqli_close($con);

?>
</body>
</html>
