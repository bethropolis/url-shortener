<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = ""; 
$dBName = "urlShortener";   


$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn){ 
    print_r(
        json_encode(
          array(
              'code'=> 4,
              'msg' => 'connection failed:'.mysqli_connect_error(),
              'type'=> 'error'
          )
        )
        
    ) ;
   die();
} 
