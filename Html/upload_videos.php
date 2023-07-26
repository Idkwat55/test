<?php
header('Content-Type: application/json');

$uploaded = [];
$allowed = ['mp4', 'png', 'mkv', 'avi','webm','webp','jpg','jpeg'];

 

// Echo the 'title' value
echo $_POST['title'];

$succeeded = [];
$failed = [];

if (!empty($_FILES['file'])) {
	foreach ($_FILES['file']['name'] as $key => $name) {
		if ($_FILES['file']['error'][$key] === 0) {
			$temp = $_FILES['file']['tmp_name'][$key];

			$ext = explode('.', $name);
			$ext = strtolower(end($ext));

			$file = md5_file($temp) . time() . '.' . $ext;

			if (in_array($ext, $allowed) === true && move_uploaded_file($temp, "Videos/{$file}") === true) {
				include 'regist.php';
				$succeeded[] = array(
					'name' => $name,
					'file' => $file,
				 
				);
			} else {
				$failed[] = array(
					'name' => $name
				);
			}
		}
	}
 
	if (!empty($_POST['ajax'])) {
		echo json_encode(
			array(
				'succeeded' => $succeeded,
				'failed' => $failed
			)
		);
	}
}
?>