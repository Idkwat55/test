<?php if(!isset($HeaderInclu)){include 'header.php';
$HeaderInclu =true ;} ?>



<?php
echo "<div class='IndexClassMain font'>";
$dir = "../Resources/Novel/Mard of Arcturus/";
echo " <p>Chapter Name </p>
      ";
$files = scandir($dir);
foreach ($files as $file) {
    if ($file != '.' && $file != '..') { // exclude parent and current directory links

        echo "  <a class = 'font IndexClassEachFile link' href=\"ChapRead.php?q=$file\">" . $file . "</a><br>   ";

    }
}
echo "    </div>";
?>



<?php include 'footer.php'; ?>