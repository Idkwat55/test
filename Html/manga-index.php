<?php
if(!isset($HeaderInclu)){include 'header.php';
$HeaderInclu =true ;} ?>

<button onclick="bac_2_func()" class="icon-circle-up bac_2_top" id="bac_2"></button>

<?php

$ContineFlg = include 'verify.php';
if ($ContineFlg === (false || null)) {
    echo "<script>
    console.error('Sign In Error');
    </script>";
    exit;
}

$dir = "../Resources/Manga/manga_dump/";
if (is_dir($dir)) {
   if ($dh = opendir($dir)) {
      while (
         ($file = readdir($dh))
         !== false
      ) {
         if ($file != "." && $file != "..") {

            echo "<div class='contH'>     <!-- main container -->
            <div class='cont_inside_contH'  >  
            " . $file . "
            <div class='cont_inside_cont_Himg'>  <!-- image inside card-->
            <a class='cont_inside_cont_Himg font'  href='../Resources/Manga/manga_dump/" . $file . "/open.php'>
            <img loading='lazy' src='../Resources/Manga/manga_dump/" . $file . "/001.png' alt = 'img " . $file . " not found'></a>
            </div>
            </div>
            </div>
            ";
         }
      }
      closedir($dh);
   }
}
?>




<?php include 'footer.php'; ?>

<script type="text/javascript" src="../../script/common.js"></script>

</body>

</div>
</div>

</html>