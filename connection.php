<?php 
$servername="localhost";
$username="root";
$password="";
$database="italk";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die('Error'.mysqli_connect_error());
}


?>
