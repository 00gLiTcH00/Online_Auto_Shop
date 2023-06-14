<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "proiect_ewd";

if(!$conn = mysqli_connect($host,$user,$pass,$dbname))
{
	die("Imi pare rau. Am esuat.");
}

?>