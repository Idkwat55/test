<?php
if (isset($_GET['dir'])) {
    $dir = $_GET['dir'];
} else {
    $dir = "../Education/";
}

if (isset($_GET['parent'])) {
    $parent = $_GET['parent'];
} else {
    $parent = dirname($dir);
}

echo "<ul>";
if ($dir !== "../Education/") {
    echo "<li><a class='link font' href='javascript:void(0);' onclick='loadDirectory(\"$parent\")'><- Back</a></li>";
}

$files = array_diff(scandir($dir), array(".", ".."));
foreach ($files as $file) {
    $path = $dir . '/' . $file;
    if (is_file($path)) {
        echo "<li><a class='link font' target='_blank' rel='noopener noreferrer' href='$path'>$file</a></li>";
    } elseif (is_dir($path)) {
        echo "<li><a class='link font' href='javascript:void(0);' onclick='loadDirectory(\"$path\", \"$dir\")'>$file</a></li>";
    }
}
echo "</ul>";
?>

<script>
    function loadDirectory(dir) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("file-list").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "file-list.php?dir=" + dir, true);
        xhttp.send();
    }
    function goBack() {
        window.history.back();
    }
</script>