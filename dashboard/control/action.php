<?php include 'connection.php';
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
	$vcv = checkFormData($_POST['vcv']); 
	$center = checkFormData($_POST["center"]);

	
	// CHECK FOR EMPTY FIELD
	if ($fullname === "" || $email === "" || $phone === "" || $password ==="" || $gender === "" || $center === "" || $vcv == "") {
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
		 // EMAIL VALIDATION
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 	echo "Invalid Email Address";
		 	$error += 1;
		 	
		 }else{
		 	$error += 0;
		 	echo "";
		 }
		 if ($error == 0) {
		 	// ADD USER
		 	$query = mysqli_query($conn, "SELECT * FROM profile WHERE email = '$email'");
		 	if (mysqli_num_rows($query) > 0) {
		 		echo "Email Already Exist <br> If you previously registered with this email <a href='login.php' class='nav-link-text'>Click here</a>";
		 	}else{

		 		// VCV VALIDATION 
		 		
		 		$vcvCheckQuery = mysqli_query($conn, "SELECT * FROM vcv WHERE vcv='$vcv'");
		 		if (mysqli_num_rows($vcvCheckQuery) > 0) {
			 		$insertQuery = mysqli_query($conn, "INSERT INTO `profile` (`profile_id`, `fullname`, `email`, `tel`, `password`, `center`, `date`) VALUES (NULL, '$fullname', '$email', '$phone', '$password', '$center', now())");

			 		if ($insertQuery) {
			 			echo 'User Registered Successfully proceed to <a href="login.php" class="nav-link-text"> login </a>';
			 		}else{
			 			die(" UNABLE TO REGISTRED USER ". mysqli_error($conn));
			 		}

		 		}else{
		 			echo "Invalid VCV";
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
				
				echo " hOW ARE O";
			}else{
				echo "USER DOESN'T EXIST";
				// echo 'User validate successfully  <a href="?page=dashboard"> click here </a> to proceed';
				// include 'session.php';
				// // echo $_SESSION['id'];
			}
		}


	}

}


// SEND ANSWER CODE ONLY

if (isset($_POST['subassign'])) {
	$title = checkFormData($_POST['title']);
	$code = mysqli_escape_string($conn, $_POST['code']);
	$yturl =  checkFormData($_POST['yturl']);
	$profileId = checkFormData($_SESSION['id']);
	$sessionId = checkFormData($_SESSION['id']);
	
	if (empty($title) || empty($code)) {
		echo "Fill all required Field";
	}else{

		$query = mysqli_query($conn, "INSERT INTO `upload`(`upload_Id`, `profile_id`, `video_url`, `raw_code`, `title`, `date`) VALUES (NULL, $sessionId, '$yturl','$code','$title', now())");
		if (!$query) {
			die("UNABLE TO UPLOAD". mysqli_error($conn));
		}else{
			echo "UPLOAD SUCCESSFULLY";
		}
	}
}

// VCV GENERATION

if (isset($_POST['centerVcv'])) {
	
	$center = checkFormData($_POST['centerVcv']);
	$vcv = rand(100000, 980786);
	$vcvInsert = $center."-".$vcv;
	$vcvQuery = mysqli_query($conn, "INSERT INTO vcv(vcv, date) VALUES('$vcvInsert', now())");

	if ($vcvQuery) {
		echo $vcvInsert;
	}else{
		die("UNABLE TO ADD vcv".mysqli_error($conn));
	}
}




