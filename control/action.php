<?php include '../dashboard/connection.php';
	include 'function.php';


// REGISTER QUERY
if (isset($_POST['register'])) {
	// POST VALUES FROM REGISTRED PAGE 
	$error = 0;
	$fullname = checkFormData($_POST["fullname"]); 
	$email = checkFormData($_POST["email"]);  
	$phone = checkFormData($_POST["phone"]);  
	$password = checkPassword($_POST["password"]); 
	$gender = checkFormData($_POST["gender"]); 
	$center = checkFormData($_POST["center"]);

	
	// CHECK FOR EMPTY FIELD
	if ($fullname === "" || $email === "" || $phone === "" || $password ==="" || $gender === "" || $center === "") {
		echo "All field is required";
	}else{
		// CHECK FOR PASSWORD LENGTH
		 if (strlen($password) < 6) {
		 	echo "Password is too short";
		 	$error += 1;

		 }else{
		 	$error += 0;
		 	echo "";
		 }

		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 	echo "Invalid Email Address";
		 	$error += 1;
		 	
		 }else{
		 	$error += 0;
		 	echo "";
		 }
		 if ($error == 0) {
		 	$query = mysqli_query($conn, "SELECT * FROM profile WHERE email = '$email'");
		 	if (mysqli_num_rows($query) > 0) {
		 		echo "Email Already Exist <br> If you previously registered with this email <a href='login.php' class='nav-link-text'>Click here</a>";
		 	}else{
		 		$insertQuery = mysqli_query($conn, "INSERT INTO `profile` (`profile_id`, `fullname`, `email`, `tel`, `password`, `center`, `date`) VALUES (NULL, '$fullname', '$email', '$phone', '$password', '$center', now())");

		 		if ($insertQuery) {
		 			echo 'User Registered Successfully proceed to <a href="login.php" class="nav-link-text"> login </a>';
		 		}else{
		 			die(" UNABLE TO REGISTRED USER ");
		 		}
		 	}
		 }
	}
}


// LOGIN QUERY

if (isset($_POST['login'])) {
	$error = 0;
	$email = checkFormData($_POST["email"]); 
	$password = checkPassword($_POST["password"]);

	// CHECK FOR EMPTY FIELD
	if ($email == "" || $password == "") {
		echo "All field is required";

	}else{
		// IF NOT EMPTY VALIDATE USER EMAIL INPUT AND USER AVAILABILITY IN DATABASE
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email Address";
			$error += 1;
		}else{
			echo " ";
			$error += 0;
		}

		if ($error == 0) {
			$queryLogin = mysqli_query($conn, "SELECT * FROM profile WHERE email = '$email'");
			if (mysqli_num_rows($queryLogin) > 0) {

				$userRow = mysqli_fetch_assoc($queryLogin);
				$userPassword = $userRow['password'];

				if (password_verify($password, $userPassword)) {
					echo 'User validate successfully  <a href="dashboard/index.php" class="nav-link-text"> click here </a> to proceed';
					 include 'session.php';

					}else{
						echo "INVALID PASSWORD";
					}		
				
			}else{
				echo "USER DOESN'T EXIST";
				
			}
		}


	}

}