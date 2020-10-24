<?php 
	include 'control/header.php';	
	unset($_SESSION['id']);
	session_destroy();
	echo $_SESSION['id'];
	header("Location: ../");

?>