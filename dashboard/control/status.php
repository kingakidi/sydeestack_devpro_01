<?php 

if ($status = 'pending') {
	$query= mysqli_query($conn, "UPDATE `upload` SET status='approve' WHERE upload_Id=$id");
	header("Location: ?page=devpro");
	echo "$status";

}else{
	echo $status;
		// $query= mysqli_query($conn, "UPDATE `upload` SET status='pending' WHERE upload_Id=$id");
 	// 	header("Location: ?page=devpro");
 }
