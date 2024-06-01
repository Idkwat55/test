<?php

$VID = $_POST['VID'];
$AID = $_POST['AID'];
$event = $_POST['event'];
$CC = $_POST['CC'];
$SCFLG = $_POST['SCFLG'];
$CID = $_POST['CID'];
include 'dbsql.php';

AddComment($VID, $AID, $event, $SCFLG, $CID,$CC);

?>