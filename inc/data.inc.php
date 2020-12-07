<?php
# require database 
include_once 'dbh.inc.php';
# handle errors
include_once 'error.inc.php';
# set headers
header('Access-Control-Allow-Origin: *');  
header('content-type: application/json'); 

//   check for post request 
if(isset($_POST['id'])){ 
     # if the others were set
    if(!isset($_POST['slug'])|!isset($_POST['url'])){
        $err2->err();
        die(); 
    }
    # if they all are empty
    if (empty($_POST['id'])|empty($_POST['slug'])|empty($_POST['url'])){
        $err3->err();
        die();  
    }

    # declare variables
   $id = $_POST['id'];
   $slug = $_POST['slug'];
   $url =  $_POST['url'];
   
   # database query to confirm that slug does not exist
   $Slug_check_sql = "SELECT * FROM `url` WHERE `slug`='$slug'";
   $Slug_response = $conn->query($Slug_check_sql); 
   if ($Slug_response->fetch_assoc() >= 1){
       $err4->err();
       die();  
   }
   
   # database query to insert info
   $sql = "INSERT INTO `url` (`user`,`url`,`slug`) VALUES(?,?,?)";
   $stmt = $conn->prepare($sql); 
   $stmt->bind_param('sss',$id,$url,$slug); 
   $stmt->execute();  
   print_r(
       json_encode(
           array( 
               'code'=> 20, 
               'msg'=> 'short url successfully created',
               'type'=>'success'
             )
           )
       ) ; 
}  



//check for get request
if (isset($_GET['id'])){
    $Slug_result = [];
    $i = 0;
    $user = $_GET['id']; 
    $Slug_get_sql = "SELECT * FROM `url` WHERE `user`='$user'";
    $Slugs_response = $conn->query($Slug_get_sql); 

while ($slug = mysqli_fetch_assoc($Slugs_response)){   
          $Slug_result[$i] =[
                            'user'=> $slug['user'],
                            'url' => $slug['url'],
                            'slug' => $slug['slug'],
                            'visit'=> $slug['visits']    
                            ]; 
        $i++;
 } 
  
 print_r(json_encode($Slug_result));  
}