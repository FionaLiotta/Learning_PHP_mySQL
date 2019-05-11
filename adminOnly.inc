<?php
session_start();
if($_SESSION['role'] != 'admin') {
	header('LOCATION:final_login.php');
	die();
}
?>