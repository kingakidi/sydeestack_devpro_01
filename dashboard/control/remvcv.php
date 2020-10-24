<?php 
	
	if (isset($_GET['vId'])) {
		$vId = $_GET['vId'];
		$query = mysqli_query($conn, "DELETE FROM vcv WHERE id=$vId");
		if ($query) {
			header("Location: ?page=vcv");
		}else{
			die("UNABLE TO REMOVE VCV ".mysqli_error($conn));
		}
	}

?>