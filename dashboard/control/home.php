			<!-- CONTENT CONTAINER -->
			<div class="container-c">
				<div class="container-action">			
					<div id="content">
						<?php 
							if (isset($_GET['page'])) {
								
							$page = $_GET['page'];
								switch ($page) {
									case 'dashboard':
										include 'post.php';
										break;
									case 'access':
										include 'dashboard.php';
										break;
									case 'course':
										include 'course.php';
										break;
									case 'devpro':
										include 'devpro.php';
										break;
									case 'users':
										include 'users.php';
										break;
									case 'vcv':
										include 'control/vcv.php';
										break;
									case 'remvcv':
										include 'control/remvcv.php';
										break;
									case 'mail':
										include 'control/mail.php';
										break;
									case 'mailsub':
									include 'control/mailsub.php';
									break;
									default:
										include 'post.php';
										break;
								}
							}else{
								include 'post.php';
							}


							if (isset($_GET['page']) && isset($_GET['filePostId'])) {
								
										include 'upload.php';
										

							}

								// APPROVE UPLOAD STATUS

							if (isset($_GET['uId']) && isset($_GET['status'])) {
								$id = $_GET['uId'];
								$status = $_GET['status'];
								include 'status.php';
							}

							// CHANGE USER TYPE

							if (isset($_GET['page']) && isset($_GET['uId']) && isset($_GET['uType'])) {
								$cId = checkFormData($_GET['uId']);
								$uType = checkFormData($_GET['uType']);
								include 'urole.php';
							}
							?>

					</div>
				


				</div>
				<div class="container-report">
					PROGRESS REPORT GOES HERE 
				</div>

				<!-- <div  id="sticky-footer" class="footer ">
					<a href="" class="sidebar-link"> Copyright @ Dev Pro </a> <a href="" class="sidebar-link">Privacy </a> <a href="" class="sidebar-link"> Term and Condition</a>
				</div> -->
			</div>
		</div>

		
	</div>
		