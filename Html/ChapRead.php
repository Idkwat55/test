<?php 
if(!isset($HeaderInclu)){include 'header.php';
    $HeaderInclu =true ;}
$Getname = $_GET['q'];
echo $Getname;

include 'footer.php';
?>