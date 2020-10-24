

// LOGIN 

$('#login').click(function (e) {
			e.preventDefault();
			$errorVal = $('#error');
			$email = $('#email').val();
			$password = $('#password').val();

			if ($email === "" || $password === "" ) {
				$errorVal.html("All field is required");
			}else{
					// $errorVal.html('Good to Go')
					$errorVal.removeClass('text-warning')
					$errorVal.addClass('text-success')


					$.post('control/action.php', {
						login: 1,
						email: $email,
						password: $password,
						}, function (data) {
						$errorVal.html(data)
					})
				}

		})
// END OF LOGIN


// REGISTER

$('#submit').click(function (e) {
			e.preventDefault();
			$error = 0;
			$errorVal = $('#error');
			$fullname = $('#fullname').val();
			$email = $('#email').val();
			$phone = $('#phone').val();
			$password = $('#password').val();
			$gender = $('#gender').val();
			$center = $('#center').val();

			if ($fullname == "" || $email == "" || $password == "" || $gender == "" || $phone == "" || $center == "") {
				$errorVal.html('All field is required')
				$error = 1;
			}else{

				if ($password.length < 6 ) {
					$errorVal.html('Password is too short')
				}else{
					
					$errorVal.removeClass('text-warning')
					$errorVal.addClass('text-success')


					$.post('dashboard/control/action.php', {
						register: 1,
						fullname: $fullname,
						email: $email,
						phone: $phone,
						password: $password,
						gender: $gender,
						center: $center
					}, function (data) {
						$errorVal.html(data)
					})
				}
				
			}

			

		})

// END OF REGISTER



// SUBMIT ASSIGNMENT (WITHOUT FILES) QUERY

$('#subassign').click(function (e) {
			$error = "";
			e.preventDefault();
			$title = $('#title').val();
			$code = $('#code').val();
			$yturl = $('#yturl').val();

			if ($title === "") {
				$error += "Title Field is required <br>";
			}else{
				$error += "";
			}

			if ($code == "") {
				$error += "Code Field is required";
			}else{
				$error += "";
			}

			$('#error').html($error);

			if ($error == "") {
				$.post('control/action.php', {

					title: $title,
					code: $code, 
					subassign: 1,
					yturl: $yturl

				}, function (data) {
					$('#error').html(data)
				})
			}

		})


// GENERATE VCV
$('#vcv').click(function (e) {
	e.preventDefault();

	$center=$('#center').val();

	if ($center == "") {
		$('.val').html('SELECT CENTER').addClass('text-warning');
	}else{
		$.post('control/action.php', {
		centerVcv: $center
	}, function (data) {
		$('.val').html(data).addClass('text-info').removeClass('text-warning');
		
	})

	}


})


