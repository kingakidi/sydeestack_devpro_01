<?php 

	include 'connection.php'; 
	include 'function.php';
	include 'codeconn.php';



if (!isset($_SESSION['id'])) {
	header("Location: ../");;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../vendor/custom-style.css">
	<link rel="stylesheet" type="text/css" href="../vendor/dashboard.css">
</head>
<body>
	<div class="row-c">
		<div class="nav">
			<!-- LOGO  -->
				<div class="nav-logo">
					<span class=""> <a href="../index.php"  class="nav-link-text">
					<?php 

						$userId = $_SESSION['id'];
						$query = mysqli_query($conn, "SELECT fullname FROM `profile` WHERE profile_id=$userId");
						$result = mysqli_fetch_assoc($query);
						$userName = explode(" ", $result['fullname']);
						echo ucwords(current($userName));

						?>
						</a> </span>
				</div>
				<!-- SEARCH BAR   -->
				
				<div class="nav-search">
					<input type="text" name="search" class="nav-search-input" placeholder="Search...">
				</div>

				<!-- LOGIN/ REGISTER -->
				<div class="nav-link">
					<a href="logout.php" class="nav-link-text"> Logout </a>
					
				</div>

		</div>
		<div class="main">
			<!-- SIDE BAR -->
			<div class="sidebar">

				<!-- SIDEBAR LINKS  -->
				<div class="sidebar-link-container">
					<a href="?page=dashboard" class="sidebar-link"> DB </a>
					<hr class="sidebar-divider">
					<a href="?page=access" class="sidebar-link"> ACCESS</a>
					<hr class="sidebar-divider">
					<a href="?page=course" class="sidebar-link"> COURSES </a>

					<?php 

							if ($_SESSION['userType'] == 'admin') {
								
								echo '<hr class="sidebar-divider">';
								echo '<a href="?page=devpro" class="sidebar-link">DP</a>';
								echo '<hr class="sidebar-divider">';
								echo '<a href="?page=users" class="sidebar-link">USERS </a>';
								echo '<hr class="sidebar-divider">';

								echo '<a href="?page=vcv" class="sidebar-link">VCV</a>';
								echo '<hr class="sidebar-divider">';

								echo '<a href="?page=mail" class="sidebar-link">MAILS</a>';
								echo '<hr class="sidebar-divider">';

								echo '<a href="?page=mailsub" class="sidebar-link">SUBCRIBERS</a>';
							}

						
					 ?>
					
				</div>
				<!-- SIDEBAR MOTO -->
				<div class="motto">
					<a href="" class="sidebar-link"> &copy; Dev Pro </a>
				</div>

			</div>