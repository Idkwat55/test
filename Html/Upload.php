<?php
use Symfony\Component\HttpFoundation\Request;

function formatBytes($bytes, $precision = 2)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Calculate the value in the appropriate unit
    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}



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
    $maxFileSize = 817900000;
    $maxFileSizeInBytes = formatBytes($maxFileSize, 0);
    if (isset($_FILES['file'])) {
        if ($fileSize > $maxFileSize) {
            $okFlg = false;
            $error[] = "File size Exceeds " . $maxFileSizeInBytes . "!";

        }
        if (!in_array($fileExten, $allowedExt, true)) {
            $error[] = "Chosen file format is not allowed" . "!";

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

                    $response = [
                        'status' => 'success',
                        'message' => 'File uploaded successfully!',
                        'title' => $title,
                        'fileName' => $fileName
                    ];
                    echo json_encode($response);
                } catch (Exception $err) {
                    $response = [
                        'status' => 'error',
                        'message' => 'Database error: ' . $err->getMessage()
                    ];
                    echo json_encode($response);
                }
                exit;
            } else {
                $response = [
                    'status' => 'error',
                    'message' => '[XS036_1 : I_ErrMovFile(33-57)]'
                ];
                echo json_encode($response);
                exit;
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => implode(', ', $error)
            ];
            echo json_encode($response);
            exit;
        }

    }
}
?>