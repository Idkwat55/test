<!DOCTYPE html>
<html lang="en">

<head>
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <meta name="author" content="Risikesvar G">
     <meta name="keywords" content="Sammlung,SMLG,Risikesvar,RISI,Entertainemt">
     
     <title> </title>
     <link rel="stylesheet" type="text/css" href="../Css/02- css.css" />
     <link rel="stylesheet" type="text/css" href="../Css/css2.css" />
     <!-- <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"> -->
    <link rel="icon" type="image/x-icon" href="../Resources/images/favicon.ico">
</head>

<div class="my"> <!-- slide down effect -->
     <div class="unselectable"> <!-- self- explaining -->
          <body>

               <header id="header">

                    <div class="font_for_header">
                         <div class="navbar"> <!-- nav bar and its buttons -->
                              <a id="home_btn" class="icon-home" href="./home-index.php"> </a>
                              <!-- drop down stuff -->
                              <a onclick="dropdowns()" style="cursor:pointer;" id="dropdown2"
                                   class="new3 icon-burger_list_menu_navigation_icon"></a>
                              <div id="dropdown" class="drpshow my2">
                                   <a id="hov1" class="icon-books" href=" ./home-novels.php"></a>
                                   <a id="hov2" class="icon-film" href="../Html/videos.php"></a>
                                   <a id="hov3" class="icon-lock" href="./manga-index.php"></a>
                              </div>
                              <a id="upload_opt" class="icon-upload3" href="./Uploads_html.php"> </a>
                              <p class="navtxt  " onclick="window.open('./about.php' ,'_self') ">Sammlung</p>
                              <a id="account" href="account.php" style="cursor: pointer;" class="icon-user"></a>
                              <a id="switch" style="cursor: pointer;" onclick="switchTheme(); "
                                   class="icon-moon_sharp_icon">
                              </a>
                              <!-- dark mode ^ -->
                         </div>
                    </div>

               </header>
<?php 
global $HeaderInclu;
global $FooterInclu;
global $AvoidLoopVerifFlg ; //avoid verify file loop load 
?>