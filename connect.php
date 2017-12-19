
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

$select_db = mysqli_select_db($con,$database);
if (!$select_db){
echo "Failed to select MySQL: " . mysqli_connect_error();}

?>