<?php 

global $ReissueReq;
global $RenewedToke ;
if (!isset($ReissueReq) || $ReissueReq === false){
    $ReissueReq = true;
}
include 'verify.php';

echo $RenewedToke;


?>