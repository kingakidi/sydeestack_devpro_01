<nav class="nav">


<!-- LOGO  -->

	
	<?php 
		if (isset($_SESSION['id'])) {
			// LOGIN NAV BAR
			?>
			
				<div class="nav-logo">
					<span> <a href="dashboard/index.php" class="nav-link-text"> Admin </a></span>
					<!-- <span class=""> <a href="dashboard/index.php" class="nav-link-text"> 

					<?php 

						$userId = $_SESSION['id'];
						$query = mysqli_query($conn, "SELECT fullname FROM `profile` WHERE profile_id=$userId");
						$result = mysqli_fetch_assoc($query);
						echo ucwords($result['fullname']);

						?> 



					</a> </span> -->
				</div>
				<!-- SEARCH BAR   -->
				
				<div class="nav-search">
					<input type="text" name="search" class="nav-search-input" placeholder="Search...">
				</div>

				<!-- LOGIN/ REGISTER -->
				<div class="nav-link">
					<a href="dashboard/logout.php" class="nav-link-text"> Logout </a>
					
				</div>
			

		<?php }else{  
			// NOT LOGIN NAV BAR
		 ?>
			
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
			
		<?php } ?>
			
</nav>