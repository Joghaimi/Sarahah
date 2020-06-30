<?php 
    require_once '../lib/db.php';    
    require_once '../lib/islogedin.php';
    require_once '../lib/query.php';
    // require_once '../delete_post.php';
//delete link

if(isset($_POST['lovepost'])){
    $user_id=islogedin::logedin();
    $post_ids=$_POST['lovepost'];
    // echo $post_ids;
    $stmt = "UPDATE receivedmsg Set loved=:loved Where id =:id ";
    // $stmt = "INSERT INTO users(name ,password,email)values(:name,:password,:email)";

    $param = array(":loved"=>1,":id"=>$post_ids); 
    
    
    $query = query::querys($stmt,$param);
 
    if($query->rowCount()>0){
        echo "1";
    }
    
}