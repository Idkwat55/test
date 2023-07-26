<?php
use Symfony\Component\HttpFoundation\Request;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $okFlg = true;
    $error = [];
    $dir = "../Uploads/Videos";

    $fileSize = $_FILES['file']['size'];
    $fileOrigName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileExten = pathinfo($fileOrigName, PATHINFO_EXTENSION);

    $allowedExt = ['mp4', 'webp', 'webm', 'jpg', 'jpeg', 'png'];
    $error = [];

    if (isset($_FILES['file'])) {
        if ($fileSize > 111097152) {
            $okFlg = false;
            $error[] = " File size exceeds 22mb ";

        }
        if (!in_array($fileExten, $allowedExt, true)) {
            $error[] = "File format is not allowed";

        }
        if (empty($error)) {
            $randomString = bin2hex(random_bytes(8)); // Generate a random string
            $timestamp = time(); // Get the current timestamp

            $fileName = $timestamp . '_' . $randomString . '.' . $fileExten;
            if (move_uploaded_file($fileTmpName, $dir . '/' . $fileName)) {
                try {
                    $title = $_POST['title'];
                    include_once "dbsql.php";
                    AddPost((string) $title, (string) $fileName);

                } catch (Exception $err) {
                    echo "fail" . $err->getMessage();
                }

                //header("Location: home-index.php"); // Redirect after successful upload

                exit; // Make sure to exit after the redirect
            } else {
                exit;
            }

        } else {
            foreach ($error as $err) {
                echo $err;
            }
        }

    }
}
?>