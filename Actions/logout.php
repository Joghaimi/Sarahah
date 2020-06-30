<?php 
    include_once "../lib/db.php";
    include_once "../lib/query.php"; 
    include_once "../lib/islogedin.php";
    $islogein = islogedin::logedin();
    if(!$islogein){ header("Location:login.php"); } #is loged in 
    $token = $_COOKIE['Saraha'];
    $user_id = $_COOKIE['user_id'];
    $stmt = "DELETE  FROM token Where token =:token and user_id =:user_id";
    $param = array(":token"=> $token , ":user_id"=>$user_id);
    $querys=query::querys($stmt , $param);
    header("Location:../index.php");
