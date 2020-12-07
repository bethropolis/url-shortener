<?php
include_once './inc/dbh.inc.php'; 
 if (isset($_GET['id'])){
     $slug = $_GET['id']; 
     $Load_slug = "SELECT * FROM `url` WHERE `slug`='$slug'";
     $Slugs_response = $conn->query($Load_slug)->fetch_assoc();
     if($Slugs_response != null){   
         $url = $Slugs_response['url'];
         $id=$Slugs_response['id']; 
         $visits = $Slugs_response['visits']+1;   
         $conn->query("UPDATE `url` SET `visits`='$visits' WHERE `id`='$id'");   
         header("Location: $url");   
     }  
 exit(); 
 }  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>url shortener</title>
    <link rel="stylesheet" href="./lib/materialize/css/materialize.min.css">  
    <link rel="stylesheet" href="./lib/font-awesome/font-awesome.min.css"> 
    <link rel="stylesheet" href="./css/style.css">     
    <script src='./lib/jquery/jquery.js'></script>
    <script src="./js/cookie.js"></script>
    <!----------POST script    -------------------->
    <script src="./js/post.js"></script>
    <!------------script for loader ----------------->  
    <script src="./js/loader.js"></script>
</head>
<body class="center">  

<!-------nav-bar------------------->  
<nav class="nav-wrapper">
 <div class="sidenav-trigger right"> 
     <a href="dashboard.php" class="nav-content">dashboard</a>  
     <a href="#" class="nav-content" title="fork me on github"><i class="fa fa-github fa-2x"></i></a>  
 </div>   
  </nav> 
<!------------  loader   ------------>   
  <div class="spinner"></div> 

<!---------------------main block------------>
    <form action="" method="POST" class="container input-field form" style="display:none;">  
          <input type="url" id="url" placeholder="enter long url...">   
          <input type="text"  title="enter the prefix" placeholder="enter slug..."> 
           <button type="submit" class="btn">shorten <i class="fa fa-link"></i></button>
    </form>
 
<!---------- display urls------------------->
<div class="urls" style="display:none;"></div> 

<!------Just showing some love---->
    <h5 class="by">by 💜 bethropolis</h5>  

<!---------main script---------->    
<script src='./js/index.js?o'></script>   
  
</body>   
</html>  