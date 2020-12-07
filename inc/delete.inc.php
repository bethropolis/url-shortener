<?php
include_once 'dbh.inc.php';
include_once 'error.inc.php';  
header('content-type: application/json'); 

if (isset($_GET['id'])) { 
    # variables
    $slug = $_GET['slug'];
    $user = $_GET['id'];   
   # database query to confirm that slug exist
   $Slug_check_sql = "SELECT * FROM `url` WHERE `slug`='$slug'";
   $Slug_response = $conn->query($Slug_check_sql); 
   if ($Slug_response->fetch_assoc() == null){
       $err3->err();
       die();  
   }

   # database query to confirm that user does not exist
   $user_check_sql = "SELECT * FROM `url` WHERE `user`='$user'";
   $User_response = $conn->query($user_check_sql); 
   if ($User_response->fetch_assoc() == null){
       $err3->err();
       die();   
   }
 
 
   $sql = "DELETE FROM `url` WHERE `slug` ='$slug'";   
   $conn->query($sql);  
   print_r(
       json_encode(
           array(
               'code' => 20,
               'msg' => 'deleted',
               'type' => 'success'
           ) 
         )
       ); 
}