<?php 
    include "../lib/db.php";
    include "../lib/islogedin.php";
    include "../lib/query.php"; 

    $islogedin =islogedin::logedin();
    if(!$islogedin){header("Location:../index.php");}
    if(isset($_POST['lovepost'])){
    }
    