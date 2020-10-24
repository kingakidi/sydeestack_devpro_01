
<table class="table table-bordered table-responsive">
	<thead>
		<th>NO</th>
		<th>EMAIL</th>
		
	</thead>
	<tbody>

<?php 
		
		$query = mysqli_query($codeConn, "SELECT * FROM new_letter");

		if (mysqli_num_rows($query) > 0) {
			$sn=0;
			while ($row = mysqli_fetch_assoc($query)) {
				$id = $row['email_id'];
			    $email = $row['email'];
			   
			    $sn++;
			   ?>
		<tr>
			<td> <?php echo $sn ?></td>
			<td> <?php echo $email ?></td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php 	

	
		}else{
			echo "NO DATA";
		}
 ?>