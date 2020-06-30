<?php
    include "../lib/db.php";
    include "../lib/islogedin.php";
    include "../lib/query.php"; 

    $islogedin =islogedin::logedin();
    if(!$islogedin){header("Location:../index.php");}
    $user_id = $_COOKIE['user_id'];

    if(isset($_POST['showsendmsgs'])){
        
        $stmt = "SELECT * FROM receivedmsg WHERE send_id=:sender";
        $param=array(":sender"=>$user_id);
        $query = query::querys($stmt,$param);
        $mseges=$query->fetchAll();
        
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
    
        }