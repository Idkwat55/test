<?php

include 'jwtk.php';
require_once '../jwt/vendor/autoload.php';
use Firebase\JWT\JWT;


$sub = $UsrSubId;
 
 
if ($FlagAllowIn){
    try {
        $payload = [
            'iss' => $iss,
            'sub' => $sub ,
            'iat' => time(),
            'name'=>$user,
            'exp' => time() + (60 * 60) // Token expiration time (1 hour)
            
        ];
     
      
        
        $jwt = JWT::encode($payload,$sec_key,"HS256");
        header('Authorization: Bearer ' . $jwt);
        setcookie("valid",true, time() + 3 * 60 * 60);
        setcookie('token',$jwt,time() + 3400);
        setcookie('User',$user,time()+3600*2);
      
       
    }catch (Exception $e){
         
        echo $e->getMessage();
    }



} 




?>