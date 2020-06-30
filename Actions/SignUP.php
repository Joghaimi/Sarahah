<?php 
#validate the input 
#make sure their is not signed up
#sign him up
    include_once "../lib/db.php";
    include_once "../lib/query.php";
    // include_once "..";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $valid = True ;
        $msg = "";
        $user_name = $_POST["user_name"];
        $password = $_POST["password"]; #password should be decoded 
        $email = $_POST["email"];
        if(!empty($user_name) && !empty($password) && !empty($email)){
            if(strlen($user_name)<6){ $msg = "user name is short"; $valid = False ;}
            if(strlen($password)<5){ $msg = "Paswword is short"; $valid = False ;}
            if($valid){
                $stmt = "SELECT * FROM users WHERE email=:email";
                $param = array(":email"=>$email);
                $querys=query::querys($stmt , $param);
                if($querys->rowCount()<1){
                    $stmt = "INSERT INTO users(name ,password,email)values(:name,:password,:email)";
                    $param = array(":name"=>$user_name , ":password"=>$password,"email"=>$email);
                    $querys = query::querys($stmt , $param);
                    if($querys->rowCount()>1){
                        $msg ="signed in";
                        $valid =True ; 
                    }


                }else{
                    $valid =false ; 
                    $msg = "email is exist";
                }
            }

        }else{
            $msg = "input is required";
        }
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/grid.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <title>صراحة</title>
</head>
<body class="backgroung col-lg-12 padding-zero " style="height:100%">
    <div class="header col-lg-12 padding-zero" >
            <div class="menue col-lg-4 cairo-font">
                <div >اتصل بنا</div><div >عن صراحة</div> <div >تسجيل </div><div >دخول</div>
            </div>
            <!-- <div class="col-lg-4"></div> -->

            <div class="logo col-lg-4 small-pad col-lg-off-4 ">
                <!-- <div class ="col-lg-4"></div> -->
                <div class="col-lg-1 small-pad input col-lg-off-2" style="margin-top:7px;color:white;"><i class="fa fa-globe fa-lg " aria-hidden="true"></i></div>        
                <div class="col-lg-6 small-pad input" ><input type="search" style="border-radius:10px; border-size:1px;border: 1px solid white ;direction:rtl" name="" class="input col-lg-11" id="" placeholder="ابحث"></div>        
                <div class="col-lg-2  small-pad " style="margin-left:15px"><img src="../img/logo300.png" alt="" srcset="" width="54" height="26" ></div>
            </div>
        </div>
    
        <div class="col-lg-8 col-lg-off-2 formcont" style="overflow: auto; min-height:500px;">
        <div class="col-lg-12 padding-zero ">   
            <div class="col-lg-4 padding-zero col-lg-off-5">
                <i class="fa fa-user-o fa-3x" style="margin-left:35px;color:#c0c0c0;" aria-hidden="true"></i>
            </div>
            <div class="col-lg-4 padding-zero col-lg-off-5">
                <span class= "cairo-font" style ="font-size:20px;margin-left:20px;color:#10bbb3;font-size:30px">تسجيل </span>
            </div>
        </div>






    <form action="signUP.php" method="post" class="col-lg-8 Form col-lg-off-2" style="background:white">
        <div class ="col-lg-12">
            <div class="container Form">
                <input type="text" name="user_name" id="" placeholder ="اسمك"  class= "col-lg-8 col-lg-off-2" style ="padding:10px; direction: rtl; border-radius:5px;border: 1px solid #C0C0C0;margin-top:10px;">
                <input type="email" name="email" id="" placeholder ="ايميلك"  class= "col-lg-8 col-lg-off-2" style ="padding:10px; direction: rtl; border-radius:5px;border: 1px solid #C0C0C0;margin-top:10px;">
                <input type="password" name="password" id="" placeholder ="رمزك " class= "col-lg-8 col-lg-off-2"  style ="padding:10px; direction: rtl; border-radius:5px;border: 1px solid #C0C0C0;margin-top:10px;" >
                <input type="submit" value="Sign Up "class="col-lg-8 col-lg-off-2  btn" style="padding:10px;border :1px solid #10BBB3;border-radius:5px; margin-top:12px;">  
            </div>
            
    </form>
    <?php if(!empty($msg)){echo '<div class="col-lg-8 col-lg-off-2 msg">'.$msg.'</div>';}?>
</body>
</html>