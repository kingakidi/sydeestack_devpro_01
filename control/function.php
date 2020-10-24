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




				
				

	

?>

