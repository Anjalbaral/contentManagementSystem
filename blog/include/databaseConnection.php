<?php 
//connection to the database

$connection = mysqli_connect("localhost","root","","graphixo");
//testing the database connection

if(mysqli_connect_errno())
{
	die("database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
}


 ?>