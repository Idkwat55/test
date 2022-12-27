 <head>
 	<title> Processing | Sammlung</title>
 </head>
 <?php include "header.php" ?>




<?php  
header('Content-Type: application/json');

$uploaded = [];
$allowed = ['mp4', 'png'];

$succeeded = [];
$failed = [];

if(!empty($_FILES['file'])){
	foreach($_FILES['file']['name'] as $key => $name){
		if($_FILES['file']['error'][$key] === 0){
			$temp = $_FILES['file']['tmp_name'][$key];

			$ext = explode('.', $name);
			$ext = strtolower(end($ext));
			$file_name = $_FILES['file']['name'][$key];
			$file = md5_file($temp) . time() . '.' . $ext;

			if(in_array($ext, $allowed) === true && move_uploaded_file($temp, "uploads/{$file_name}") === true){
				$succeeded[] = array(
					'name' => $name,
					'file' => $file
				);
			}else{
				$failed[] = array(
					'name' => $name
				);
			}
		}
	}

	if(!empty($_POST['ajax'])){
		echo json_encode(array(
			'succeeded' => $succeeded,
			'failed' => $failed
		));
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