<head>
    <title>Movies | Sammlung</title>
</head>
 <?php include 'header.php';?>

<script type="text/javascript">
   window.onload= function(){
      document.getElementById('hov2').classList.add('actives');
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


<section id="main">
<?php

$dir = "../Resources/Movies/";
 if (is_dir($dir))
 {
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            if($file != '.' && $file != '..'){
                echo "
                <div  class='cont_e_main'>
                <div class='cont_e1 font_for_homepg'>  
                <p class='abc'>\"". $file ."\" </p>              
                <video class='cont_e font_for_homepg' preload='none' controls>
                <source src=\"". $dir . $file ."\" type=\"video/mp4\"> 
                <source src=\"". $dir . $file ."\" type=\"video/ogg\">
                  <source src=\"". $dir . $file ."\" type=\"video/webm\">
                </video>
                </div>
                </div>
                ";
            }
        }
        closedir($dh);
    }
}
?>
</section>

<p> <strong>User Uploads Videos</strong></p>

<section id="user">
<?php

$dir = "../Uploads/Videos/";

 if (is_dir($dir))
 {
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            $FileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            if($file != '.' && $file != '..' && $FileType == 'mp4'|| $FileType == 'webm '){ 
                echo "
                <div  class='cont'>
                <div class='cont_inside_cont font_for_homepg'>  
                <p class='abc'> \"". $file ."\" </p>              
                <video class='cont_e font_for_homepg' preload='none' controls>
                <source src=\"". $dir . $file ."\" type=\"video/mp4\"> 
                <source src=\"". $dir . $file ."\" type=\"video/ogg\">
                  <source src=\"". $dir . $file ."\" type=\"video/webm\">
                </video>
                </div>
                </div>
                ";
            }
        }
        closedir($dh);
    }
}
?>
</section>

<?php include 'footer.php';?>