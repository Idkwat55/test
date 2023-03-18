<<?php 
echo "loading..";
$servername = "localhost";
$username = "pma";
$password = "pma@risi560";
try {
	$conn = new 
	PDO("mysql:host=$servername;dbname=myDBPDO",$username,$password);
	$conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "  connection : ok  ";
} catch (PDOException $e ){
	echo "  connection : failed!! ".$e->getMessage();
}

echo "Done.";

 ?>

