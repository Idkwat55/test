<?php
global $FlagAllowIn; //A flag to allow continuation after sql lookup, meanings usr & pswd combo crct
global $processFlag; //flag to accept inputted strings from the login form
global $showbarChar; //Flag to show banned character for username and paswd
global $UsrSubId; //Usr ID in db tb sql 
global $user; //user name as in input text field 
global $UsrId; // same as user name , as in tex field, used in jwt and jwt verifiy php
global $VeriFlg; // to look up db ,after decoding jwt
global $verifSucs; // tells result of decoded jwt look up
global $UserEmail;
global $AddMailFlg;
global $SignUpStat;

 

$VeriFlg = false;
$verifSucs = false;
$FlagAllowIn = false; //initially false
$user = str_replace(' ', '', trim($_POST['user']));
$pswd = str_replace(' ', '', trim($_POST['pswd']));

$email = str_replace(' ', '', trim($_POST['email']));



if ($_POST['submit'] == "Sign In") {
    $FlagSign = "In";

    try {

        require "sql.php"; //import sql.php

    } catch (Exception $e) {
        echo $e->getMessage();

    } finally {
        if ($FlagAllowIn === true) {

            //continue if verifiede

            include 'jwt.php';
            $GoAhead = true;

            if (!isset($_COOKIE["valid"]) || $_COOKIE["valid"] === false) {
                setcookie("valid", true, time() + 3 * 60 * 60);
                echo "<script> loaction.reload()</script>";
            }
            // Set the custom header with the variable value
            header('X-Custom-Variable: ' . $GoAhead);



        } else {

            exit("<br> Sign In Failed! <br>");
        }
    }

} elseif ($_POST['submit'] == "Sign Up") {
    $FlagSign = "Up";
    $processFlag = true;
    $check1 = "";
    function isValidEmail($email)
    {
        // Remove leading/trailing whitespaces (optional)
        $email = trim($email);

        // Validate email using filter_var function
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Additional check using a more comprehensive regular expression
            if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
                return true;
            }
        }

        return false;
    }

    if (strlen($user) <= 4) {
        $check1 .= "<br>User Name cannot be less than 4 characters!<br>";
        $processFlag = false;
    }
    if (strlen($pswd) <= 8) {
        $check1 .= "<br>Password cannot be less than 8 characters!<br>";

        $processFlag = false;
    }
    if ($email === null || $email === 'null') {
        $check1 .= "<br> Email Address is neeeded to Sign Up! <br>";
        $processFlag = false;
    }
    $processFlag = isValidEmail($email);
    if ($processFlag === false){
        $check1 .= "<br> Please provide a valid Email address! <br>";
            
    }
    /* --DO NOT DELETE MAY NEED IT-- Banned Character check

    $barredChar = array('$', '*', '?', '/', '\\', '//', '\\\\', '.', '->');
    foreach ($barredChar as $Char) {
        if (strpbrk($user, $Char) || strpbrk($pswd, $Char)) {
            echo "'" . $Char . "' is not allowed. ";
            $processFlag = false;
            $showbarChar = true;                                --DO NOT DELETE MAY NEED IT--
        }

--DO NOT DELETE MAY NEED IT--

    } 
    if ($showbarChar) {--DO NOT DELETE MAY NEED IT--
        echo "<br> Illegal Characters : ";                      --DO NOT DELETE MAY NEED IT--
        foreach ($barredChar as $Char1) {
            echo  $Char1 ."\t";
        }

--DO NOT DELETE MAY NEED IT--

    }*/

    echo $check1;
    $pass1 = "";
    if ($processFlag) {
        //delete   $pswd = include "cipherPswd.php";
        //delete  echo $pswd;
        $nameUsr = $user;
        $passwordUsr = $pswd;
        include "sql.php";
        if ($SignUpStat) {
            $FlagSign = "In";

            try {

                require "sql.php"; //import sql.php

            } catch (Exception $e) {
                echo $e->getMessage();

            } finally {
                if ($FlagAllowIn === true) {

                    //continue if verifiede

                    include 'jwt.php';
                    $GoAhead = true;

                    if (!isset($_COOKIE["valid"]) || $_COOKIE["valid"] === false) {
                        setcookie("valid", true, time() + 3 * 60 * 60);
                        echo "<script> loaction.reload()</script>";
                    }
                    // Set the custom header with the variable value
                    header('X-Custom-Variable: ' . $GoAhead);



                } else {
                 
                    
                    exit("<br> Sign In Failed! <br>");
                }
            }
        }

    } else {
       
        
        
        exit("<br> Sign Up Failed! <br>");
    }


}

?>