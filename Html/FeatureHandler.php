<?php

$type = $_POST['type'];
$VID = $_POST['VID'];
$AID = $_POST['AID']; //Not needed now, but will implement later on

include "dbsql.php";

FeatureHandler($type, $VID, $AID);

?> 