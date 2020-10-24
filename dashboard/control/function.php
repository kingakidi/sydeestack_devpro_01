<?php 

$conn = mysqli_connect('localhost', 'root', '', 'devpro');

	function checkFormData($dataVal){
		global $conn;
		$refineData = htmlspecialchars(strip_tags(strtolower($dataVal)));
		$formData = mysqli_escape_string($conn, $refineData);
		return $formData;
	}


	function checkPassword($dataVal){
		global $conn;
		$refineData = strip_tags(htmlspecialchars($dataVal));
		$formData = mysqli_escape_string($conn, $refineData);
		$formData = password_hash($formData, PASSWORD_DEFAULT); 
		return $formData;
	}

	function fileValidation($fileName, $fileExtension, $size, $type)
	{
		foreach($fileName as $key=>$tmp_name) {

				    $fileName=$_FILES["codefile"]["name"][$key];
				    $fileTmp=$_FILES["codefile"]["tmp_name"][$key];
				    $fileSize = $_FILES['codefile']['size'][$key];
				    $fileError =  $_FILES['codefile']['error'][$key];
				    

				    // GET FILE EXTENSTION
				    $expExt = explode('.', $fileName);
				    $fileExt = strtolower(end($expExt));
				  
				    if (in_array($fileExt, $fileExtension)) {
				    	if ($fileSize > $size) {
				    		echo "Maximum of $size ";
				    	}else{
				    		if ($fileError != 0) {
				    			echo "Error $type";
				    		}else{
				    			if (move_uploaded_file($fileTmp, 'files/'.$fileName)) {
				    				echo "File Uploaded Successfully";
				    			}
				    		}
				    	}
				    }else{
				    	echo "Inavlid $type $fileName";
				    }
				   
				   }
				}

	
				// TIME AGO FUNCTION

function humanTiming ($time){

    $time = time() - $time - 3600; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'yr',
        2592000 => 'mon',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hr',
        60 => 'min',
        1 => 's'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

	

?>

