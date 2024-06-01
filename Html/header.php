<!DOCTYPE html>

<html lang="en">

<head>

     <meta name="viewport" content="width=device-width,initial-scale=1">
     <meta name="author" content="Risikesvar G">
     <meta name="keywords" content="Sammlung,SMLG,Risikesvar,RISI,Entertainemt">

     <title> </title>

     <link rel="stylesheet" type="text/css" href="../Css/02- css.css" />
     <link rel="stylesheet" type="text/css" href="../Css/css2.css" />
     <link rel="icon" type="image/x-icon" href="../Resources/images/favicon.ico">

</head>


<div class="unselectable my"> <!-- self- explaining --> <!-- slide down effect -->

     <body>

          <header id="header">

               <div class="font_for_header">
                    <div class="navbar"> <!-- nav bar and its buttons -->
                         <a id="home_btn" class="icon-home" href="./home-index.php"> </a>
                         <!-- drop down stuff -->
                         <a onclick="dropdowns()" style="cursor:pointer;" id="dropdown2" class="new3 icon-menu"></a>

                         <div id="dropdown" class="drpshow my2">
                              <a id="hov1" class="icon-books" href=" ./home-novels.php"></a>
                              <a id="hov2" class="icon-film" href="../Html/videos.php"></a>
                              <a id="hov3" class="icon-lock" href="./manga-index.php"></a>
                         </div>

                         <a id="upload_opt" class=" icon-cloud-upload" style="cursor:pointer;" onclick="UplBox()"> </a>
                         <p class="navtxt  " onclick="window.open('./about.php' ,'_self') ">Sammlung</p>
                         <a id="account" onmouseover="UserOpts();" href="account.php" style="cursor: pointer;"
                              class="icon-login"></a>
                         <a id="switch" style="cursor: pointer;" onclick="switchTheme(); ">
                         </a>
                         <!-- dark mode ^ -->
                    </div>
                    <div style="display: flex;justify-content:center;">
                         <div id="UplBox" class="UplBox font">
                              <div class="icon-cross closeIconCust" onclick="UplBox();"></div>
                              <div>
                                   <span>Create a new Post:</span>
                                   <?php
                                   $FrmActnDrctr = htmlspecialchars('./Upload.php', ENT_QUOTES, 'UTF-8');
                                   ?>
                                   <form action="<?php echo $FrmActnDrctr ?>" onsubmit="Upload(event);" method="post"
                                        enctype="multipart/form-data" id="upload">
                                        <label for="file" class="file_input">
                                             <span>Click here to choose files</span>
                                        </label>
                                        <input style="display: none;" type="file" id="file"
                                             accept=".mp4,.png,.webm,.webp,.jpg,.jpeg" name="file" required>

                                        <label for="title" class="custom-file-input">
                                             <span class="font">Title</span>
                                             <textarea type="text" required name="title" class="titleInput" id="title"></textarea>
                                        </label>
                                        <input type="submit" id="submit" class="UplBtn" name="submit" value="Upload">
                                        <div class="bar">
                                             <span class="bar-fill" id="pb"><span class="bar-fill-text"
                                                       id="pt"></span></span>
                                        </div>
                                        <div id="uploads" class="uploads">

                                        </div>
                                   </form>

                              </div>
                         </div>
                    </div>

          </header>
          <?php
          global $HeaderInclu;
          global $FooterInclu;
          global $AvoidLoopVerifFlg; //avoid verify file loop load 
          ?>