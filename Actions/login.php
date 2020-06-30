<?php 
    include_once "../lib/db.php";
    include_once "../lib/query.php"; 
    include_once "../lib/islogedin.php"; 
    
    $islogein = islogedin::logedin();
    if($islogein){ header("Location:../index.php"); } #is loged in 
    echo $islogein;
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $password =$_POST['password']; #password decoded
        $email =$_POST['email'];
            // empty
       
        
        if( !empty($password) && !empty($email)){
            $stmt ="SELECT * FROM users WHERE password=:password and email=:email";
            $param=array(":password"=>$password , ":email"=>$email );
            $querys=query::querys($stmt , $param);
            
            if($querys->rowCount()>0){
                $user_info =$querys->fetchAll(PDO::FETCH_ASSOC);
                $user_id =$user_info[0]["id"];
                echo "log in succes";
                $x=TRUE;
                $token =openssl_random_pseudo_bytes(64,$x);
                $stmt = "INSERT INTO token(user_id,token) values(:user_id,:token);";
                $param=array(":user_id"=>$user_id , ":token"=>$token );
                // setcookie("Saraha_linked_locked");
                $querys=query::querys($stmt , $param);
                setcookie("Saraha",$token,time()+60*60*24*7,'/',NULL,NULL,TRUE);
                setcookie("user_id",$user_id,time()+60*60*24*7,'/',NULL,NULL,TRUE);
                // echo $user_id; 
                header("Location:../index.php");
                #cookies and sessions


            }else{
                echo "Email or Password is Wrong";
                
                echo $querys->rowCount();
                $Valid = False ;

            }
        }else{
            $Valid = False ;
            echo "cant be empty asshole";
        }
        // echo "ok";

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
                <span class= "cairo-font" style ="font-size:20px;margin-left:20px;color:#10bbb3;font-size:30px">دخول</span>
            </div>
        </div>
        <form action="" method="post" class="col-lg-8 Form col-lg-off-2" style="background:white">
            <div class ="col-lg-12">
                <input type="email" name="email" class= "col-lg-6 col-lg-off-3 "id=""  placeholder ="البريد او اسم المستخدم " style ="padding:10px; direction: rtl; border-radius:5px;border: 1px solid #C0C0C0;margin-top:10px;">
                <input type="password" name="password" class= "col-lg-6 col-lg-off-3" id="" placeholder ="الرقم السري" style ="padding:10px; direction: rtl; border-radius:5px;border: 1px solid #C0C0C0;margin-top:10px;">
                <div class="col-lg-8 col-lg-off-2 padding-zero "style="margin-top:10px;">
                    <input type="submit" value="login" class="col-lg-3 col-lg-off-1 padding-zero btn" style="padding:10px;margin-left:50px;border :1px solid #10BBB3;border-radius:5px">
                    <div class="col-lg-4 col-lg-off-2" style="direction:rtl;padding:2px">
                        <input type="checkbox" name="savelogin" id="">
                        <label for="savelogin" class="cairo-font" style="color:#C0C0C0;padding:2px">تذكرني</label>
                    </div>
                </div>
                <div class="col-lg-12 padding-zero"></div>
                <div class="col-lg-4 col-lg-off-4 pointer" style="background-color:#4267B2;padding:4px; direction: rtl;text-align: center;margin-top:10px;"><i class="fa fa-facebook-official" style="color:white" aria-hidden="true"></i><span style="color:white"> تسجيل الدخول</span></div>
                <div class="col-lg-4 col-lg-off-4 padding-zero" style="text-align: center;margin-top:10px;">نسيت الرقم السري</div>
                <div class="col-lg-12  padding-zero"></div>           
                <a href="signup.php">
                        <div class="col-lg-2 col-lg-off-5 padding-zero btn" style="padding:10px;text-align: center;border :1px solid #10BBB3;border-radius:5px">تسجيل </div></a>
            </div>
        </form>
        <?php if(!empty($msg)){echo '<div class="col-lg-8 col-lg-off-2 msg">'.$msg.'</div>';}?>
     
    </div>
</body>
</html>
