
<?php
session_start();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

echo "You have been successfully logged out";  
header("Location: http://localhost/Project---Workbook/index.php"); 
exit();

?>



