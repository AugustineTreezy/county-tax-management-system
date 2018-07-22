<?php
session_start(); 

//unset all sessions variables
unset($_SESSION['admin_name']);
unset($_SESSION['email']);

session_destroy(); // destroy session
header("location:index.php"); 
?>

