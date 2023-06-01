<?php
global $sec_key; // to get key
global $ErrValStr;

$ErrValStr = "";


if (!isset($FlagSign)) {
    $FlagSign = null; //to nullify error that rises when using sql.php, as it serves two purposes.
}


require_once '../jwt/vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

include "jwtK.php";
try {
    if (!isset($_COOKIE['token'])) {
        $ErrValStr = "You need to Sign In for this";
        throw new Exception("No Cookie Set");
    }






    $jwtVerif = $_COOKIE['token'];
    $decodJwt = JWT::decode($jwtVerif, new Key($sec_key, 'HS256'));

    $UsrSubId = $decodJwt->sub;

    $UsrId = $decodJwt->name;

    $VeriFlg = true;

    //echo "$UsrSubId, <br> $UsrId";


    include 'sql.php';

    if ($verifSucs) {
        echo "<script>
         console.log('User Verification - Success');
         
         </script> "; //to be removed are return bool
         
         if ( !isset($_COOKIE["valid"]) || $_COOKIE["valid"] === false){
            setcookie("valid",true);
            echo"<script> loaction.reload()</script>";
        }
         
    }

} catch (Exception $e) {
    if (strpos($e, "ExpiredException")) {
        $ErrValStr = "Your Session has expired, Please Log In again!";
    } elseif (strpos($e, "Wrong number of segments")) {
        $ErrValStr = "Refresh the page, clear cookies then Log In again!";
    }


    $e = $e->getMessage();

    echo "<script>
        const TokenErr = true; 
        const ErrValDev = \"$e\";
        const ErrValStrJS = \"$ErrValStr\";
        </script>";
    
    if ( !isset($_COOKIE["valid"]) || $_COOKIE["valid"] === true){
        setcookie("valid",false);
    }
    include "ErrorPg.html";
    include "account.php";
    $VeriFlg = false;
    
    exit;
   

}


?>