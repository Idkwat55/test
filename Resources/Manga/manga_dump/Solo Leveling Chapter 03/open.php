<!DOCTYPE html>
<html lang="en">

<head>

<meta name="viewport"content="width=device-width,initial-scale=1">

<title>Home | Index</title>

<link rel="stylesheet" type="text/css" href="../../../../Css/02- css.css"/>
 

<link rel="icon" type="image/x-icon" href="../../Resources/images/favicon.ico">

</head>

<div class="my">                                   <!-- slide down effect -->
<div class="unselectable">                            <!-- self- explaining -->

<body>

<header>

<div class="font_for_header">
<div class="navbar">                             <!-- nav bar and its buttons -->
 <a class="active icon-home" href="./home-index.php">   </a>

<!-- drop down stuff -->
<a onclick="dropdowns()" id="dropdown2"
          class="new3 icon-burger_list_menu_navigation_icon"></a>

     <div id="dropdown" class="drpshow my2" >
      <a id="hov1" class="icon-books"  href=" ./home-novels.html"></a>
      <a class="icon-film" href="../Html/videos.php"></a>
      <a class="icon-lock" href="../Resources/Manga/passwd_page.php"></a>
   </div>

<a class="icon-upload3" href="./uploads html.html">  </a>

 <p class="navtxt" href="./about.html">H-Indexing gsggdg</p> 

<a id="switch" onclick="switchTheme();" > <i class="icon-moon_sharp_icon"></i> </a>
     <!-- dark mode ^ -->
</div>
</div>

</header>

<button  onclick="bac_2_func()"  class="icon-circle-up bac_2_top" id="bac_2" ></button>

 <?php
 
$dir="./";
if(is_dir($dir)){
   if($dh= opendir($dir)){
      while(($file = readdir($dh))
         !== false){
         {
            echo "<div class='contH'>     <!-- main container -->
            <div class='cont_inside_contH'  >  
            filename:".$file."
            <div class='cont_inside_cont_Himg'>  <!-- image inside card-->
            <img   src=' ".$file."' alt='no img' loading='lazy'/>
            </div>
            </div>
            </div>
            ";}
         }
         closedir($dh);
      }
   }
?>


<footer> 

<p style="text-align: center;"> 
      This is a work of 
<strong> <a class="abt_link" href="./about_auth.html">Can't_Think_Of_One</strong></a>
<i  class="icon-external_link_line_icon"></i> 
</p>
<p style="text-align: center;">
<a class="abt_link" href="./about.html">H-Indexing 
</a> 
<i  class="icon-external_link_line_icon"></i>    &copy 2022</p>

</footer>

<script type="text/javascript" src="../../../../script/common.js" ></script>  

</body>

</div>
</div>

</html>