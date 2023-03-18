<head>
    <title> Sammlung | Movies</title>
</head>
 <?php include 'header123.php';?>

<script type="text/javascript">
   window.onload= function(){
      document.getElementById('hov2').classList.add('actives');
      document.getElementById('dropdown2').classList.add('actives');

   }
   
</script>


<!--
<div id="nov_tool">
    <button  onclick="bac_2_func()"  class="icon-circle-up bac_2_top" id="bac_2" ></button>
    <ul>
        <a href="videos.php#main"> Main</a>
        <a href="videos.php#user">User uploaded</a>
    </ul>
 </div>
-->
 
<div class='vid0' >
    <p class="abc"> <strong id="main"> Uploads </strong></p>
<?php

$dir = "../Resources/Movies/";
 if (is_dir($dir))
 {
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            if($file != '.' && $file != '..'){
                 $fileName_aft =pathinfo($file, PATHINFO_FILENAME);
                echo "
                 
                <div class='vid1  ' id='".$file."'>  
               
                <p class='abc'> ".$fileName_aft." </p>              
                <video class='vid2    '  controls>
                <source src=\"". $dir . $file ."\" type=\"video/mp4\"> 
                <source src=\"". $dir . $file ."\" type=\"video/ogg\">
                </video>
                <div class='vid_tools'>

                </div>
                 
                </div>
               
                
                ";
            }
        }
        closedir($dh);
    }
}
?>
 



 
    <p class="abc"> <strong id="user">User Uploads    </strong></p>
<?php 

$dir = "../Uploads/Videos/";

 if (is_dir($dir))
 {
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            $FileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            if($file != '.' && $file != '..' && $FileType == 'mp4'|| $FileType == 'webm '){
                 $fileName_aft =pathinfo($file, PATHINFO_FILENAME);
                echo "
                <div class='vid1  ' id='".$file."'>  
               
                <p class='abc'> ".$fileName_aft." </p>              
                <video class='vid2    '  controls>
                <source src=\"". $dir . $file ."\" type=\"video/mp4\"> 
                <source src=\"". $dir . $file ."\" type=\"video/ogg\">
                </video>
                                 <div class='vid_tools'>

                </div>
                </div>
               
                
                ";
            }
        }
        closedir($dh);
    }
}

?>
</div>

 


<?php include 'footer123.php';?>