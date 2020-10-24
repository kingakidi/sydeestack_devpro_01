<?php include 'control/header.php'; ?>

	<div class="content content-w">
		<div class="container mt-5">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name (Surname first)">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
				</div>
				<div class="form-group">
					<input type="number" name="phone" id="phone" class="form-control" placeholder="Phone number">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<select name="gender" class="form-control" id="gender">
						<option value=""> GENDER</option>
						<option value="male"> Male </option>
						<option value="Female"> Female </option>
					</select>
				</div>
				<div class="form-group">
					
					<select name="center" class="form-control" id="center">
						<option value=""> SELECT CENTER</option>
						<option value="fct"> FCT ABUJA</option>
						
					</select>

				</div>
				<div class="form-group">
					<input type="text" name="vcv" id="vcv" class="form-control" placeholder="VCV">
				</div>

				<div class="form-group">
					<input type="submit" name="submit" id="submit" value="Create Account" class="form-control btn btn-info">
				</div>
				<a href="login.php" class="nav-link-text">LOGIN INSTEAD</a>
			</form>
			<div class="text-warning text-center" id="error"></div>
		</div>
	</div>
<?php include 'control/footer.php'; ?>