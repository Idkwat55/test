<?php
global $sec_key; // to get key
global $ErrValStr;
global $DelAccSql;

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

    global $verifSucs;
    include 'sql.php';
 
    if (isset($verifSucs) && $verifSucs) {
        global $Details;
        $Details = [  $UsrId, $UsrSubId];
      
        if (isset($ConfirmedDelAcc) && $ConfirmedDelAcc === true) {
            $DelAccSql = true;
            include 'sql.php';

        } else {

            echo "<script>
         console.log('User Verification - Success');
         
         </script> "; //to be removed are return bool

            if (!isset($_COOKIE["valid"]) || $_COOKIE["valid"] === false) {
                setcookie("valid", true, time() + 3 * 60 * 60);
                echo "<script> loaction.reload()</script>";
            }
            if (isset($ReissueReq) && $ReissueReq === true) {
                $sub = $UsrSubId;
                $user = $UsrId;
                $FlagAllowIn = true;
                include 'jwt.php';


            }

        }
    }  else{
        throw new Exception("Verification Failed! Try Signing In again");

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

    if (!isset($_COOKIE["valid"]) || $_COOKIE["valid"] === true) {
        //  setcookie("valid", false, time() + 3 * 60 * 60);
        echo "<script> setCookie('valid',false,3/24);</script>";
    }
    include "ErrorPg.html";
    include "account.php";
    $VeriFlg = false;

    exit;


}


?>