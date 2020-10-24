<?php include 'control/header.php'; ?>
	
	<div class="content content-w">
		<div class="container form-center" >
			<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control" placeholder="ENTER YOUR REGISTERED EMAIL">
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD">
			</div>
			<div class="form-group">
				<input type="submit" name="login" id="login" class="form-control btn btn-info" value="LOGIN">
			</div>
			<a href="register.php" class="nav-link-text">CREATE ACCOUNT</a>
		</form>

		<div class="text-warning text-center" id="error"></div>
		</div>
	</div>
		
			
	
<?php include 'control/footer.php'; ?>