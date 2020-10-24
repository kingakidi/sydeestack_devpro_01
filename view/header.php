<?php include '../dashboard/connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title> Dev Progress Home </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vendor/custom-style.css">
	
</head>
<body class="d-flex flex-column">

		<div class="row-c" id="page-content">
			<nav class="nav">
				<!-- LOGO  -->
				<div class="nav-logo">
					<h3 class="nav-logo-text"> <a href="index.php" class="nav-link-text"> DEVPRO</a> </h3>
				</div>
				<!-- SEARCH BAR   -->
				
				<div class="nav-search">
					<input type="text" name="search" class="nav-search-input" placeholder="Search...">
				</div>

				<!-- LOGIN/ REGISTER -->
				<div class="nav-link">
					<a href="login.php" class="nav-link-text"> Login</a>
					<a href="register.php" class="nav-link-text"> Sign Up</a>
				</div>
			</nav>