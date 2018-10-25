<?php
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "g13g31g31g_movies";
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