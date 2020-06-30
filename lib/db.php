<?php 
    try{
        // define("host","localhost");
        // define("dbname" ,"sarahah");
        // define("user","root");
        // define("password","");
        
        define('host',"Localhost");
        define('user',"root");
        define('password',"");
        $con = new PDO("mysql:host=".host.";dbname=sarahah",user,password);
        // $con = new PDO("mysql:host=".host.";dbname=link",user,password);

        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "connection error";
    }