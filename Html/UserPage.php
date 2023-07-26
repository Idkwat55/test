
<head>
    <title>User Page | Sammlung</title>
    <meta name="description"
        content="User Page : View your Profile and customize it | Sammlung - One Place for all your Entertainemt needs">
</head>


<?php if (!isset($HeaderInclu)) {
    include 'header.php';
    $HeaderInclu = true;
} ?>
  
 
  <?php

    
$ContineFlg = include 'verify.php';
if ($ContineFlg === (false || null)) {
    echo "<script>
    console.error('Sign In Error');
    </script>";
    exit;
}
?>


<div id="profile" class="profile  font">
    <img src="../Resources/images/crop-test.jpeg"  loading="fast" class="profileIMG" onclick="window.open('../Resources/images/0012.jpg')" alt="Profile Picture"/>
<p id="profileName" class="profileName"></p>
<p id="LogOut" onclick="LogOut();" class = "profileElems">Log Out</p>
<p id="ChngPswd" onclick="ChngPswd();" class ="profileElems">Reset Password</p>
<p id="Delete" onclick="Delete();" class="profileElems" style="background-color:  rgba(255, 0, 0, 0.747);" >Delete Account</p>
</div>
 

<?php include 'footer1.php' ?>