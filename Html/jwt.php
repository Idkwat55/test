<?php

include 'jwtk.php';
require_once '../jwt/vendor/autoload.php';
use Firebase\JWT\JWT;

$iss = "SMLG_GNL_SR";
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
        setcookie('token',$jwt,time() + 3600);
      
       
    }catch (Exception $e){
         
        echo $e->getMessage();
    }



} 




?>