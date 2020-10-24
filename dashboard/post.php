<!-- VIEW NUMBER OF SUBMITTED ASSIGNMENT -->

<table class="table table-bordered">
	<thead>
		<th>S/N</th>
		<th> TITLE</th>
		<th> PERIOD</th>
		<th> REQUEST</th>
	</thead>
	<tbody>


		<?php 
	$userId = $_SESSION['id'];
	$sn = 0;
	$query = mysqli_query($conn, "SELECT * FROM `upload` WHERE profile_id = $userId ORDER BY upload_Id DESC");

	if (mysqli_num_rows($query) > 0) {
		
		while ($row = mysqli_fetch_assoc($query)) {
			$sn +=1;
			$uploadId = $row['upload_Id'];
			$title = $row['title'];
			$date = strtotime($row['date']);
			$elapseTime = humanTiming($date).' ago';

			echo "<tr>";
			echo "<td> $sn  </td>";
			echo "<td>  <a href='?page=post&filePostId=$uploadId' class='nav-link-text'> $title</a> </td>";
			echo "<td> $elapseTime </td>";
			echo "<td> <a href='#' class='nav-link-text'> Request Edit</a>  </td>";
			echo "</tr>";
			
		}
	}else{
		echo "<td colspan='4'> NO DATA </td>";
	}

?>
		


		
	</tbody>
</table>