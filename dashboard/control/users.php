<table class="table table-responsive table-bordered">
	<thead>
		<th>S/N</th>
		<th>FULLNAME</th>
		<th>EMAIL</th>
		<th>CENTER</th>
		<th>DATE</th>
		<th>UR</th>
	</thead>
	<tbody>

<?php 

	$query = mysqli_query($conn, "SELECT * FROM profile");
	
	while ($row = mysqli_fetch_assoc($query)) {

		$profileId = $row['profile_id'];
    	$fullname = ucwords($row['fullname']);
	    $email = $row['email'];
	    $tel = $row['tel'];   
	    $center = ucwords($row['center']);
	    $date = $row['date'];
	    $usertype = $row['usertype'];
	    $date = strtotime($row['date']);
		$elapseTime = humanTiming($date).' ago';

	    echo "<tr>";
		echo "<td> $profileId</td>";
		echo "<td> $fullname</td>";
		echo "<td> $email</td>";
		echo "<td> $center</td>";
		echo "<td> $elapseTime</td>";
		echo "<td> <a href='?page=users&uId=$profileId&uType=$usertype' class='nav-link-text'> $usertype </a></td>";
		echo "</tr>";
	     ?>
	
	<?php } ?>


	</tbody>
</table>