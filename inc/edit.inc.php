<?php
include_once 'dbh.inc.php';
include_once 'error.inc.php'; 

 
 if (isset($_POST['id'])) {  
    # variables
    $slug = $_POST['slug'];
    $user = $_POST['id'];   
    $edit = $_POST['edit'];
    $url = $_POST['url']; 
   # database query to confirm that slug exist
   $Slug_check_sql = "SELECT * FROM `url` WHERE `slug`='$slug'";
   $Slug_response = $conn->query($Slug_check_sql); 
   if ($Slug_response->fetch_assoc() == null){
       $err3->err();
       die();  
   }

   # database query to confirm that user does exist
   $user_check_sql = "SELECT * FROM `url` WHERE `user`='$user'";
   $User_response = $conn->query($user_check_sql); 
   if ($User_response->fetch_assoc() == null){
       $err3->err();
       die();   
   } 
    # database query to confirm that url does exist
   $url_check_sql = "SELECT * FROM `url` WHERE `url`='$url'";
   $Url_response = $conn->query($url_check_sql); 
   if ($Url_response->fetch_assoc() == null){
       $err3->err();
       die();   
   }

 
   $sql = "UPDATE `url` SET `slug` = '$edit' WHERE `slug` = '$slug' AND `url`='$url';";        
   $conn->query($sql);   
   print_r(
       json_encode(
           array(
               'code' => 20,
               'msg' => 'edited', 
               'type' => 'success'
           ) 
         )
       ); 
}