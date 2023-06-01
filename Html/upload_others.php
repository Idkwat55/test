<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title>Upload | Video - Processing</title>

	<link rel="stylesheet" type="text/css" href="../Css/02- css.css" />


	<link rel="icon" type="image/x-icon" href="../Resources/images/favicon.ico">

</head>

<div class="my"> <!-- slide down effect -->
	<div class="unselectable"> <!-- self- explaining -->

		<body>

			<header>

				<div class="font_for_header">
					<div class="navbar"> <!-- nav bar and its buttons -->
						<a class="active icon-home" href="./home-index.html"> </a>

						<!-- drop down stuff -->
						<a onclick="dropdowns()" id="dropdown2" class="new3 icon-burger_list_menu_navigation_icon"></a>

						<div id="dropdown" class="drpshow my2">
							<a id="hov1" class="icon-books" href=" ./home-novels.html"></a>
							<a class="icon-film" href="../Html/videos.php"></a>
							<a class="icon-lock" href="../Resources/Manga/passwd_page.php"></a>
						</div>

						<a class="icon-upload3" href="./uploads html.html"> </a>
						<a id="switch" onclick="switchTheme();"> <i class="icon-moon_sharp_icon"></i> </a>
						<!-- dark mode ^ -->
					</div>
				</div>

			</header>

			<?php
			$target_dir = "../Uploads/Others/";
			$target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
			$uploadOk = 1;
			$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			//check if image is actual image
			
			// check if already in stroage
			if (file_exists($target_file)) {
				echo " <p class='uploadecho_error'> There is already a file with that name. 
	   Try changing name of the file. </p> ";
				$uploadOk = 0;
			}

			if ($FileType != "exe" && $FileType != "pdf" && $FileType != "css" && $FileType != "jpg" && $FileType != "png" && $FileType != "zip" && $FileType != "rar" && $FileType != "xlsx" && $FileType != "docx" && $FileType != "oxt" && $FileType != "txt" && $FileType != "apk" && $FileType != "srt" && $FileType != "odt") {
				echo " <p class='uploadecho_error'> You have submitted unsupported file formats. Try changing file's format or use other Upload Forms. Check out our supported formats down below. </p>  ";
				$uploadOk = 0;

			}

			//check if uploadok wasc set to o
			if ($uploadOk == 0) {
				echo "<p class='uploadecho_error'><strong>Files were NOT uploaded</strong> </p>";
			} else {
				if (move_uploaded_file($_FILES['upload_file']["tmp_name"], $target_file)) {
					echo "<p class='uploadecho_success'> The File(s):  <br> " . htmlspecialchars(basename($_FILES['upload_file']["name"])) . " <br>  
		   <strong> has been successfully Uploaded </strong> </p>";
				} else {
					echo " error while uploading file";
				}
			}

			?>
			<div class="supported">
				<p>Our supported File Formats </p>
				<div class="highlight"> exe</div>
				<div class="highlight"> pdf</div>
				<div class="highlight"> css</div>
				<div class="highlight">jpg </div>
				<div class="highlight"> png</div>
				<div class="highlight"> xlsx</div>
				<div class="highlight">zip </div>
				<div class="highlight">rar </div>
				<div class="highlight"> docx</div>
				<div class="highlight"> oxt</div>
				<div class="highlight"> odt</div>
				<div class="highlight">apk </div>
				<div class="highlight">srt </div>

			</div>

			<footer style="position: fixed; bottom: 0; width: 100%;">

				<p style="text-align: center;">
					This is a work of
					<strong> <a class="abt_link" href="./about_auth.html">Can't_Think_Of_One</strong></a>
					<i href="./about_auth.html" class="icon-external_link_line_icon"></i>
				</p>
				<p style="text-align: center;">
					<a class="abt_link" href="./about.html">H-Indexing
					</a>
					<i href="./about.html" class="icon-external_link_line_icon"></i> &copy 2022
				</p>

			</footer>

			<script type="text/javascript" src="../script/common.js"></script>

		</body>

	</div>
</div>

</html>