<?php 
$servername="";
$username="";
$password="";
$database="";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die('Error'.mysqli_connect_error());
}


?>
