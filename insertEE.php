<?php	
session_start();
?>

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

$query="CREATE TABLE IF NOT EXISTS JobseekerTable (id int(6) NOT NULL auto_increment,Name varchar(25) NOT NULL,Email varchar(30) NOT NULL,Password varchar(30) NOT NULL,PRIMARY KEY (id),UNIQUE id (id))";
mysqli_query($con,$query);
  
$regist_name=$_POST['myname'];
$regist_email=$_POST['myemail'];
$regist_password=$_POST['mypassword'];
 
$query = "INSERT INTO JobseekerTable VALUES ('','$regist_name','$regist_email','$regist_password')";
mysqli_query($con,$query);

$query="CREATE TABLE IF NOT EXISTS EEprofiles(id INT(6) NOT NULL auto_increment, Name VARCHAR(10) NOT NULL,Email VARCHAR(30) NOT NULL,Password varchar(30) NOT NULL, Location VARCHAR(25) NOT NULL,Photo LONGBLOB,ResumeContent VARCHAR(100) NOT NULL,Skill VARCHAR(30) NOT NULL,ResumeFile LONGBLOB NOT NULL, PRIMARY KEY(id),UNIQUE id (id))";
mysqli_query($con,$query);
 
$query = "INSERT INTO EEprofiles VALUES ('','$regist_name','$regist_email','$regist_password','','','','','')";
mysqli_query($con,$query);
mysqli_close($con);

$_SESSION['myemail'] = $regist_email;
echo "You have been successfully logged in as an employer";//if the user is logged in Greets the user with message   
header("Location: http://localhost/Project---Workbook/index.php"); 
exit();

?>
</body>
</html>


