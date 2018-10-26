<?php 
session_start();
$_SESSION['to_name']=$_GET['id'];
//check function goes in here
header('location:message.php');

?>
