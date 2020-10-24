	<div class="content">
		<?php 

				$uploadId = $_GET['filePostId'];
				$uploadSql = mysqli_query($conn, "SELECT * FROM `upload` WHERE upload_Id = $uploadId");
				$row = mysqli_fetch_assoc($uploadSql);
				$accessTitle = $row['title'];
				echo "<span class='text-success m-3'>FILE UPLOAD FOR $accessTitle  <span class='text-info'>  <a href='?page=dashboard' class='nav-link-text'> Click here to refresh</a> </span></span>"; 

		?>
		<form method="POST" action="" method="POST" enctype="multipart/form-data">
			
			<!-- UPLOAD CODE PICTURES  AND FILES   -->
			<div class="form-group">
				<label> Upload Pictures (jpg, png, jpeg) </label>
				<input type="file" name="codefile[]" id="codepicture" class="form-control-file pictures" multiple>
			</div>
			<div class="form-group">
				<input type="submit" name="file" id="fileUpload" value="UPLOAD" class="form-control btn btn-info">
			</div>
		<div class="text-center" id="error">
			<?php 


				if (isset($_POST['file'])) {
					$uploadId = $_GET['filePostId'];
					$userId = $_SESSION['id'];
					$fAE = array('jpg', 'png', 'jpeg');
					
					foreach ($_FILES['codefile']['tmp_name'] as $key => $codefile) {
						

							// SELECT THE LAST ROW OF FILES 
							$lFileQuery = mysqli_query($conn, "SELECT img_id FROM `files` WHERE user_id=$userId AND upload_id=$uploadId ORDER BY img_id DESC LIMIT 1");
							$lrow = mysqli_fetch_assoc($lFileQuery);
							$lrowName = $lrow['img_id'];
							$lFile = explode('.', $lrowName);
							$lFileName = current($lFile);
							$lFileName =(int)$lFileName+1;
							// END OF LAST ROW OF FILES
							

						$fileName = $_FILES['codefile']['name'][$key];
						$fileTemp = $_FILES['codefile']['tmp_name'][$key];
						$fileSize = $_FILES['codefile']['size'][$key];
						$fileError = $_FILES['codefile']['error'][$key];

						$uExplode = explode('.', $fileName);
						$fileExt = end($uExplode);
						$NewFileName = $lFileName.".".$fileExt;
						
							// CHECK FILE ERROR
						if ($fileError == 0) {
							// CHECK FILE EXTENSION
							if (in_array($fileExt, $fAE)) {
								// CHECK FILE SIZE 
								if ($fileSize <= 500000) {

									if (move_uploaded_file($fileTemp, 'files/'.$NewFileName)) {
										$query = mysqli_query($conn, "INSERT INTO `files`(`img_id`, `upload_id`, `user_id`, `image_name`) VALUES (NULL, $uploadId,$userId, '$NewFileName')");


										if (!$query) {
											die("UNABLE TO UPDATE FILES".mysqli_error($conn));
										}
										echo "<p class='m-0 text-success'> <strong> $fileName</strong> Uploaded Successfully <a href='?page=dashboard' class='nav-link-text'>Click here to refresh</p>";
									}else{
										echo "Unable to Upload file";
									}

								}else{
									echo "<p class='text-danger m-0'> File is too large <strong> $fileName </strong> Maximum of 500KB</p>";
								}
							}else{
								echo "<p class='m-0 text-danger'> Invalid file type <strong> $fileName </strong></p>";

							}
						}else{
							echo "<p class='m-0 text-danger'> File error <strong> $fileName </strong></p>";
							
						
					}
						}

				}
			?>
		</div>			
	</div>