<?php 

	if ($uType == 'admin') {
		
			$query = mysqli_query($conn, "UPDATE `profile` SET `usertype`='user' WHERE profile_id = $cId");
			if (!$query) {
				die('UNABLE TO CHANGE USER TYPE'.mysqli_error($conn));
			}

			header("Location: index.php?page=users");
	}elseif ($uType == 'user') {
		$query = mysqli_query($conn, "UPDATE `profile` SET `usertype`='admin' WHERE profile_id = $cId");
		if (!$query) {
				die('UNABLE TO CHANGE USER TYPE'.mysqli_error($conn));
		}

		header("Location: index.php?page=users");

	}


