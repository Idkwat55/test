
 <head>
 	<title> Processing | Sammlung</title>
 </head>
 <?php include "header.php" ?>




<?php  
header('Content-Type: application/json');
$target_dir = "../Uploads/Videos/";
$uploadOk = 1 ;

 
 //check if image is actual image
if (!empty(array_filter($_FILES['upload_file']['name']))){
	foreach ($_FILES['upload_file']["tmp_name"] as $key => $value) {
		$tmp_filename= $_FILES['upload_file']["tmp_name"][$key];
		$file_name = $_FILES['upload_file']['name'][$key];
		$target_file_path = $target_dir.$file_name;
		$FileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
		// check if already in stroage
		if (file_exists($target_file_path)) {
			$count = 1;
			$counter = "(".$count.")";
			$GLOBALS['file_name']=  $file_name.$counter;
			$count++;
			echo ($file_name);
			echo($count);
		
		// file type
			if (  $FileType != "mp4" && $FileType != "mkv" && $FileType != "avi" && 
				$FileType != "webm"){
				echo "  <p class='uploadecho_error'> You have submitted unsupported file formats. Try changing file's format or use other Upload Forms Check out our supported formats down below. </p>  ";
			    $uploadOk= 0;
			}
			//check if uploadok wasc set to o
			if ($uploadOk==0) {
				echo " <p  class='uploadecho_error'> <strong> Files were NOT uploaded <strong> </p>";
			} else {
				if (move_uploaded_file($tmp_filename,$target_file_path)) {
					echo "<p class='uploadecho_success'>  The File(s) <br/> ".$file_name. " <br/> <strong> has been successfully Uploaded </strong> </p>";
				} else {
					echo " error while uploading file";
				}
			}
		}
	}
}
?> 








<div class="supported">
	<p>Our supported File Formats </p> 
	<div class="highlight">mkv</div>
	<div class="highlight">avi</div>
	<div class="highlight">mp4 </div>
</div>
 
 <?php include 'footer1.php' ?>