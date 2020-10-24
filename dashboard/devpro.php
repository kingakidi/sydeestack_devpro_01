<!-- VIEW NUMBER OF SUBMITTED ASSIGNMENT -->
<table class="table table-bordered table-responsive">
	<thead>
		<th>S/N</th>
		<th> TITLE</th>
		<th> USERNAME </th>
		<th> PERIOD</th>
		<th> EDIT</th>
		<th>STATUS</th>

	</thead>
	<tbody>


		<?php 
	$userId = $_SESSION['id'];
	$sn = 0;
	$query = mysqli_query($conn, "SELECT * FROM `upload`");

	if (mysqli_num_rows($query) > 0) {
		
		while ($row = mysqli_fetch_assoc($query)) {
			$sn +=1;
			$uploadId = $row['upload_Id'];
			$title = $row['title'];
			$date = strtotime($row['date']);
			$profileId = $row['profile_id'];
			$status = $row['status'];
			$elapseTime = humanTiming($date).' ago';
			echo "<tr>";
			echo "<td> $sn  </td>";
			echo "<td>  <a href='?page=post&filePostId=$uploadId' class='nav-link-text'>$title</a> </td>";
			echo "<td> $profileId</td>";
			echo "<td> $elapseTime </td>";
			echo "<td> <a href='edit.php?uId=$uploadId' class='nav-link-text'>Edit</a>  </td>";
			echo "<td> <a href='?uId=$uploadId&status=$status' class='nav-link-text'>$status</a>  </td>";
			

			
			echo "</tr>";
			
		}
	}else{
		echo "NO DATA";
	}

?>
		


		
	</tbody>
</table>