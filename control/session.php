<?php 

	$sessionQuery = mysqli_query($conn, "SELECT * FROM profile WHERE email = '$email'");
	if ($sessionQuery) {
		
		$result = mysqli_fetch_assoc($sessionQuery);

		$UserId = $result['profile_id']; 
	    $userFullname = $result['fullname'];
	    $_SESSION['id'] = $UserId;
	    $_SESSION['userType'] = $result['usertype'];
	    


	}else{
		echo "UNABLE TO FETCH DETAILS";
	}

?>