<?php 
    class islogedin{
        public static function logedin(){
            if(isset($_COOKIE['Saraha']) && isset($_COOKIE['user_id'])){
                $token = $_COOKIE['Saraha'];
                $user_id = $_COOKIE['user_id'];
                $stmt = "SELECT * FROM token WHERE user_id =:user_id and token=:token";
                $param = array(":user_id"=>$user_id , ":token"=>$token);
                $querys=query::querys($stmt , $param);
                if($querys->rowCount()>0){
                    return TRUE;
                }else {
                    return FALSE;
                }
            }else{
                return FALSE;

            }

        }
    }