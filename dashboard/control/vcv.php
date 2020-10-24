<div>
	<form method="post">
	<div class="m-4">
		<div class="form-group">
		<select class="form-control" id="center">
			<option value=""> SELECT CENTER</option>
			<option value="fct"> FCT </option>
			<option value="kd"> KADUNA</option>
			<option value="lkj"> LOKOJA</option>
			<option value="zr"> ZARIA</option>
		</select>
		</div>
		<div class="form-group">
			<input type="button" name="" value="GENERATE VCV" class="btn btn-info" id="vcv">
		</div>

	</div>
</form>
<div class="val m-4"></div>
</div>
<div>
	<table class="table">
		<thead>
			<th>S/N</th>
			<th>VCV</th>
			<th>DATE</th>
			<th>ACTION</th>
		</thead>
		<tbody>

			<?php 
				$vcv = mysqli_query($conn, "SELECT * FROM vcv");
				if (mysqli_num_rows($vcv) > 0) {
					$sn =0;
					while ($row = mysqli_fetch_assoc($vcv)) {
						$sn +=1;
						$id = $row['id'];
						$value = $row['vcv'];
						$date = strtotime($row['date']);
						$elapseTime = humanTiming($date).' ago';


						echo "<tr>";
						echo "<td> $sn </td>";
						echo "<td> $value</td>";
						echo "<td> $elapseTime</td>";
						echo "<td> <a href='?page=remvcv&vId=$id' class='nav-link-text'> Remove </a></td>";
						echo "</tr>";
					}

				}else{
					echo "<tr>
							<td> NO DATA</td>
						</tr>";
				}

			?>
		</tbody>
	</table>
</div>