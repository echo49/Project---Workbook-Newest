
<?php
session_start();
require('connect.php');
//If the form is submitted or not.
//If the form is submitted
if (isset($_POST['myemail']) and isset($_POST['mypassword']))
{
$signin_email=$_POST['myemail'];
$signin_password=$_POST['mypassword'];
//Checking the values are existing in the database or not 

$query = "SELECT * FROM jobseekertable WHERE Email='$signin_email' AND Password='$signin_password' ";

$result=mysqli_query($con,$query)or die(mysqli_error($con));
$count=mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1)
{
$_SESSION['myemail'] = $signin_email;
		echo "You have been successfully logged in as a job seeker";//if the user is logged in Greets the user with message
		header("Location: http://localhost/Project---Workbook/index.php"); 
		exit();
}
else
{
	$query = "SELECT * FROM employertable WHERE Email='$signin_email' AND Password='$signin_password' ";
	$result=mysqli_query($con,$query)or die(mysqli_error($con));
	$count=mysqli_num_rows($result);
	if ($count == 1)
	{
		$_SESSION['myemail'] = $signin_email;
		echo "You have been successfully logged in as an employer";//if the user is logged in Greets the user with message   
		header("Location: http://localhost/Project---Workbook/index.php"); 
		exit();
	}
	else
	{
		echo "Invalid Login Email/Password";
	}
}

}
$con->close();
?>


