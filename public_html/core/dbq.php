<?php
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "g13g31g31g_movies";
// $servername = "sql7.freemysqlhosting.net:3306";

// $username = "sql7262995";
// $password = "pL3Jzd5PYd";
// $dbname = "sql7262995";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 
else
{
	$conn->set_charset("utf8");
	} 
?>