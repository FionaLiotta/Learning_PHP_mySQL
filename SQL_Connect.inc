<?php
$servername ="";
$dbname ="myDB";
$username ="username";
$password ="MySql2018";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>