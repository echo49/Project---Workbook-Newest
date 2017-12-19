<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if (!isset($_SESSION['name'])) {
    header("location:register/main_register.php");
}
