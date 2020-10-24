<?php include 'control/header.php'; ?>

			<!-- CONTENT SECTION  -->

<div class="content">
	<div class="content-items-g">
	<?php 
	
	if (isset($_GET['gId'])) {

		$gId = $_GET['gId'];
		$uploadSql = mysqli_query($conn, "SELECT * FROM `upload` WHERE upload_Id=$gId");
	
	while ($row = mysqli_fetch_assoc($uploadSql)) {
		  $uploadId=$row['upload_Id']; 
	      $profileId=$row['profile_id']; 
	      $video=$row['video_url'];
	      $code=$row['raw_code'];
	      $title = strtoupper($row['title']);
	      $date = strtotime($row['date']);
		  $elapseTime = humanTiming($date).' ago';

	      // TITLE 
	      echo  '<h4 class="content-items-title">'. strtoupper($title). '</h4>';
	      echo "<div class='center-img'>";
			      // IMAGE 
			      $imageNames = array();
			      $fileQuery = mysqli_query($conn, "SELECT * FROM `files` WHERE upload_Id=$uploadId");
			      if (mysqli_num_rows($fileQuery) > 0) {
			      	

			      	while ($rowAssoc = mysqli_fetch_assoc($fileQuery)) {
			      	$imgName = $rowAssoc['image_name'];
			      	array_push($imageNames, $imgName);
			      
			      }
			      
			      if (!empty($video)) {
			      	echo "Their is video";
			      }
			      echo "<img src='dashboard/files/$imageNames[0]' class='content-items-img'>";
			    }else{
			    
			    	echo '<img src="1.jpg" class="content-items-img">';
			    }
			      
				?>

			</div>

			<!-- END OF IMAGE -->
		<div>
			<?php echo $code; ?>
			<hr>
		</div>
		<p class="content-items-author"><span> <?php echo $elapseTime; ?> </span>  </p>
	</div>
	<?php }
	}else{
		echo "NOT YET SET";
	}

	?>

	
</div>
<?php include 'control/footer.php'; ?>


<?php 

$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('Dev - Pro', $title, $pageContents);

 ?>
