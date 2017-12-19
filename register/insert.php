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

$query="CREATE TABLE register (id int(6) NOT NULL auto_increment,Name varchar(25) NOT NULL,Email varchar(30) NOT NULL,Password varchar(30) NOT NULL,PRIMARY KEY (id),UNIQUE id (id))";
mysqli_query($con,$query);
  
$regist_name=$_POST['myname'];
$regist_email=$_POST['myemail'];
$regist_password=$_POST['mypassword'];
 
$query = "INSERT INTO register VALUES ('','$regist_name','$regist_email','$regist_password')";
mysqli_query($con,$query);

mysqli_close($con);

?>
</body>
</html>


