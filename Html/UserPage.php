
<?php 
$ipAddress = $_SERVER['REMOTE_ADDR'];
echo "IP Address: " . $ipAddress;
echo "<script> alert('$ipAddress')</script>"
?>