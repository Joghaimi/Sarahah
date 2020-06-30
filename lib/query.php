<?php 
    class query{
        public static function querys($stmt , $param =array()){
            global $con ; 
            $querys= $con->prepare($stmt);
            foreach($param as $key => $value ){
                $querys->bindparam($key,$param[$key]);
                // $query->bindparam($key,$param[$key]);
            }
            $querys->execute();
            return $querys;
    //         if ($querys->rowCount()>0){
    //             return $querys;
    //         }else {
    //             return false ; 
    //         }

    //     } 
    }}