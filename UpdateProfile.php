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

$query="CREATE TABLE IF NOT EXISTS EEprofiles(id INT(6) NOT NULL auto_increment, Name VARCHAR(10) NOT NULL,Email VARCHAR(30) NOT NULL,Password varchar(30) NOT NULL, Location VARCHAR(25) NOT NULL,Photo LONGBLOB,ResumeContent VARCHAR(100) NOT NULL,Skill VARCHAR(30) NOT NULL,ResumeFile LONGBLOB NOT NULL, PRIMARY KEY(id),UNIQUE id (id))";

mysqli_query($con,$query);

 // This is the directory where images will be saved
$target = "upload/";
$target1 = $target . basename( $_FILES['photo']['name']); 
$target2 = $target . basename( $_FILES['resumefile']['name']); 

$RP_name=$_POST['ename'];
$RP_email=$_POST['email'];
$RP_password=$_POST['mypassword'];
$RP_location=$_POST['location'];
$RP_photo=$_FILES['photo']['name'];
$RP_resumecontent=mysqli_real_escape_string($con, $_POST['resumecontent']);
$RP_skill=$_POST['skill'];
$RP_resumefile=$_FILES['resumefile']['name'];

$myquery = "UPDATE EEprofiles SET Name = '$RP_name', Password= '$RP_password', Location= '$RP_location', Photo= '$RP_photo', ResumeContent= '$RP_resumecontent', Skill= '$RP_skill', ResumeFile= '$RP_resumefile' 
WHERE Email = '$RP_email'";
if ($con->query($myquery) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}


if(move_uploaded_file($_FILES['photo']['tmp_name'], $target1))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory";
}
else{echo "Sorry, there was a problem uploading your file.";
};

if(move_uploaded_file($_FILES['resumefile']['tmp_name'], $target2))
    {echo "The file ". basename( $_FILES['resumefile']['name']). " has been uploaded, and your information has been added to the directory";}
//Gives and error if its not
    else 
	{echo "Sorry, there was a problem uploading your file.";
}

mysqli_close($con);

$_SESSION['myemail'] = $RP_email;
header("Location: http://localhost/Project---Workbook/Myprofile.php"); 
exit();

?>
</body>
</html>
