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

$query="CREATE TABLE IF NOT EXISTS ResumePosting(id INT(6) NOT NULL auto_increment,Name VARCHAR(10) NOT NULL,Email VARCHAR(30) NOT NULL,Location VARCHAR(25) NOT NULL,Photo BLOB,ResumeContent VARCHAR(100) NOT NULL,Skill VARCHAR(30) NOT NULL,ResumeFile BLOB NOT NULL, PRIMARY KEY(id),UNIQUE id (id))";

//Filename VARCHAR(25) NOT NULL DEFAULT ''

mysqli_query($con,$query);

 // This is the directory where images will be saved
$target = "upload/";
$target1 = $target . basename( $_FILES['photo']['name']); 
$target2 = $target . basename( $_FILES['resumefile']['name']); 

$RP_name=$_POST['ename'];
$RP_email=$_POST['email'];
$RP_location=$_POST['location'];
$RP_photo=$_FILES['photo']['name'];
$RP_resumecontent=mysqli_real_escape_string($con, $_POST['resumecontent']);
$RP_skill=$_POST['skill'];
$RP_resumefile=$_FILES['resumefile']['name'];

//$RP_resumetmp=addslashes (file_get_contents($_FILES['resumefile']['tmp_name']));


$query = "INSERT INTO ResumePosting VALUES ('','$RP_name','$RP_email','$RP_location','$RP_photo','$RP_resumecontent','$RP_skill','$RP_resumefile')";

mysqli_query($con,$query);

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

?>
</body>
</html>
