<?php 
    # styling the send message =>Done 
    # send message table => done
    # edit the profile and add profile picture 
    # edit the header -> make the links active , make it attached 
    # enable the other sections like send and love 

    include_once "lib/db.php";
    include_once "lib/query.php"; 
    include_once "lib/islogedin.php"; 
    
    // echo "Sarahah main page "; 
    $islogein = islogedin::logedin();
    if(!$islogein){ header("Location:actions/login.php"); } #is loged in 
    $token = $_COOKIE['Saraha'];
    $user_id = $_COOKIE['user_id'];
    $stmt = "SELECT * from users where id=:id";
    $param = array(":id"=>$user_id);
    $query = query::querys($stmt,$param);
    $info=$query->fetchAll()[0];
    $stmt = "SELECT * FROM receivedmsg WHERE sendto_id =:user_id"; 
    $param =array(":user_id"=>$user_id);
    $query = query::querys($stmt,$param);
    $mseges=$query->fetchAll();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/grid.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <script src="lib/ajax.js"></script>     
    <script src="lib/Function.js"></script> 
    <title>صراحة</title>
</head>

<body class="backgroung col-lg-12 padding-zero " style="height:100%">
<div class="header col-lg-12 padding-zero" >
        <div class="menue col-lg-4 cairo-font">
            <div >اتصل بنا</div>
            <div >عن صراحة</div>
            <a href="actions/logout.php"><div>خروج</div></a>
            <div >الخيارات  </div>
            <a href= "index.php"><div >الرسائل</div></a>
        </div>
        <!-- <div class="col-lg-4"></div> -->

        <div class="logo col-lg-4 small-pad col-lg-off-4 ">
            <!-- <div class ="col-lg-4"></div> -->
            <div class="col-lg-1 small-pad input col-lg-off-2" style="margin-top:7px;color:white;"><i class="fa fa-globe fa-lg " aria-hidden="true"></i></div>        
            <div class="col-lg-6 small-pad input" ><input type="search" style="border-radius:10px; border-size:1px;border: 1px solid white ;direction:rtl" name="" class="input col-lg-11" id="" placeholder="ابحث"></div>        
            <div class="col-lg-2  small-pad " style="margin-left:15px"><img src="img/logo300.png" alt="" srcset="" width="54" height="26" ></div>
        </div>
    </div>
    
    <div class="col-lg-10 col-lg-off-1 " style="height:100px; background-color:white; margin-top:20px;">
        <div class="col-lg-4 padding-zero col-lg-off-5" style="position:relative ; top:-30px">
                <img src="img/avatar.png" alt="" height="70" width="70" srcset="">
        </div>  
        <div class="col-lg-4 padding-zero col-lg-off-5" style="position:relative ; top:-30px">
              <?php echo "<span>".$info[1]."</span>";?>
        </div>
    </div>   
    <div class="col-lg-10 col-lg-off-1 " id="container" style="background-color:white; margin-top:20px;">
       <div class="col-lg-12 padding-zero">
           <div class="col-lg-4 padding-zero icon"  id="send" onclick="showsendmsgs()"  style="padding:10px;color:#C0C0C0;text-align:center"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></div>
           <div class="col-lg-4 padding-zero icon " id="showliked" onclick="showliked();" style="padding:10px;color:#C0C0C0;text-align:center"><i class="fa fa-heart  fa-lg" aria-hidden="true"></i></div>
           <div class="col-lg-4 padding-zero icon active" id="getmsg" onclick="getmsg('showmsg','include/getmsgs.php', 'containers');" style="padding:10px;color:#C0C0C0;text-align:center "><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></div>
       </div>
       <br style=" margin-top:20px;" id="">
       <div class="clear" ></div>
        <!--meesage recived  -->
        <div id="containers">
        <?php 
    
        foreach($mseges as  $msg){
            echo '    <div id="msg" class ="recived col-lg-6 col-lg-off-3 padding-zero" style="border:1px solid #F5F8FA;margin-top:10px;">
                <div class="col-lg-12 padding-zero" style="padding:10px;">'.$msg['msg'].'</div>
                <div class="col-lg-12 padding-zero" style="background-color:#F5F8FA;padding:3px;">
                    <div class="col-lg-4 padding-zero">
                    :
                    <span></span>
                    </div>
                    <div class="col-lg-off-4 col-lg-4 padding-zero">
                     <div class="col-lg-4 padding-zero icons pointer"><i class="fa  fa-share-alt" aria-hidden="true"></i></div>
                     <div class="col-lg-4 padding-zero icons pointer"  onclick="lovepost('.$msg['id'].')"><i class="fa fa-heart" aria-hidden="true"></i></div>
                     <div class="col-lg-4 padding-zero icons pointer"><i class="fa fa-share" aria-hidden="true"></i></diV>
                     </div>
               
                </div>
            </div>'; 
        }

    ?>
        <!-- message recived -->
        </div>
    </div>


</body>
</html>