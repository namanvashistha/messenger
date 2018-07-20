<?php 
$servername="sql206.epizy.com";
$username="epiz_21399173";
$password="namanvashistha";
$database="epiz_21399173_db";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die('Error'.mysqli_connect_error());
}


?>