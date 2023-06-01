<?php
global $FlagAllowIn; //A flag to allow continuation after sql lookup, meanings usr & pswd combo crct
global $processFlag; //flag to accept inputted strings from the login form
global $showbarChar; //Flag to show banned character for username and paswd
global $UsrSubId; //Usr ID in db tb sql 
global $user; //user name as in input text field 
global $UsrId; // same as user name , as in tex field, used in jwt and jwt verifiy php
global $VeriFlg; // to look up db ,after decoding jwt
global $verifSucs; // tells result of decoded jwt look up

$VeriFlg = false;
$verifSucs = false;
$FlagAllowIn = false; //initially false
$user = $_POST['user'];
$pswd = $_POST['pswd'];

//$BarePswd = $_POST['pswd'];
/*
$pswd = password_hash($BarePswd,PASSWORD_ARGON2ID);
if (password_verify($BarePswd, $pswd)) {
    // Password matches
    echo "<br>Password is correct.";
} else {
    // Password does not match
    echo "<br>Password is incorrect.";
}*/
 

if ($_POST['submit'] == "Sign In") {
    $FlagSign = "In";
    
    try {
     //delete   echo"Pass 1 ";
      //delete  echo $pswd ;
       //delete echo "<br>";
      //delete  $pswd= include "cipherPswd.php";
      //delete  echo $pswd ;
     //delete   echo" --------------<br><br>";
        require "sql.php"; //import sql.php
    //delete  echo "pass 2 ";
    } catch (Exception $e){
        echo $e;
;    }
    finally {
        if ($FlagAllowIn === true ) {
           //delete echo "<br>pass 3 <br>";
          //  $pswd= include "cipherPswd.php";
 //delete echo "aaf ";
		//delete	echo $pswd;
            //continue if verifiede
            
            include 'jwt.php';
            $GoAhead =true;
          
            if ( !isset($_COOKIE["valid"]) || $_COOKIE["valid"] === false){
                setcookie("valid",true);
                echo"<script> loaction.reload()</script>";
            }
// Set the custom header with the variable value
header('X-Custom-Variable: ' . $GoAhead);
            

        } else {

            exit("<br> Sign In failed");
        }
    }

}
 elseif ($_POST['submit'] == "Sign Up") {
    $FlagSign = "Up";
    $processFlag = true;
    $check1 = "";
    if (strlen($user) <= 4) {
        $check1 .= "<br>User Name cannot be less than 4 characters!<br>";
        $processFlag = false;
    }
    if (strlen($pswd) <= 8) {
        $check1 .= "<br>Password cannot be less than 8 characters!<br>";
        $processFlag = false;
    }
    $barredChar = array('$', '*', '?', '/', '\\','//','\\\\' ,'.','->');
    foreach ($barredChar as $Char) {
        if (strpbrk($user, $Char)) {
            echo "'" . $Char . "' is not allowed";
            $processFlag = false;
            $showbarChar = true;
        }

    }
    if ($showbarChar) {
        foreach ($barredChar as $Char1) {
            echo $Char1;
        }

    }

    echo $check1;
    $pass1 = "";
    if ($processFlag) {
     //delete   $pswd = include "cipherPswd.php";
      //delete  echo $pswd;
        $nameUsr = $user;
        $passwordUsr = $pswd;
        include "sql.php";

    } else {

        exit("<br>Sign Up Failed!");
    }


}

?>