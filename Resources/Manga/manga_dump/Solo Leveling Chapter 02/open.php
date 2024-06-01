<?php include '../../../../../Html/header.php' ?>

<button  onclick="bac_2_func()"  class="icon-circle-up bac_2_top" id="bac_2" ></button>
<a href="../../../../../Html/header.php"> TEST LINK </a>
 <?php
 
$dir="./";
if(is_dir($dir)){
   if($dh= opendir($dir)){
      while(($file = readdir($dh))
         !== false){
         if($file != "." && $file != "..") {
            echo "<div class='contH'>     <!-- main container -->
            <div class='cont_inside_contH'  >  
             
            <div class='cont_inside_cont_Himg'>  <!-- image inside card-->
            <img   src=' .$file.' loading='lazy'/>
            </div>
            </div>
            </div>
            ";}
         }
         closedir($dh);
      }
   }
?>


<?php include '../../../../Html/footer.php' ?>