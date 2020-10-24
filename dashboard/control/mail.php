
<table class="table table-bordered table-responsive">
	<thead>
		<th>NO</th>
		<th>FIRSTNAME</th>
		<th>LASTNAME</th>
		<th>EMAIL</th>
		<th>SUBJECT</th>
		<th>DATE</th>
	</thead>
	<tbody>

<?php 
		
		$query = mysqli_query($codeConn, "SELECT * FROM mail_list");

		if (mysqli_num_rows($query) > 0) {
			$sn=0;
			while ($row = mysqli_fetch_assoc($query)) {
				$id = $row['mail_id'];
			    $firstname = $row['firstname'];
			    $lastname = $row['lastname'];
			    $email = $row['email'];
			    $subject = $row['subject'];
			    $date = $row['date'];
			    $sn++;
			   ?>
		<tr>
			<td> <?php echo $sn ?></td>
			<td> <?php echo $firstname ?></td>
			<td> <?php echo $lastname ?></td>
			<td> <?php echo $email ?></td>
			<td> <?php echo $subject ?></td>
			<td> <?php echo $date ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php 	

	
		}else{
			echo "NO DATA";
		}
 ?>