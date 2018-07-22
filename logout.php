<?php
session_start(); 

//unset all sessions variables
unset($_SESSION['username']);
unset($_SESSION['id_number']);

session_destroy(); // destroy session
header("location:index.php"); 
?>

