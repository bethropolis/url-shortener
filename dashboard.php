<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lib/materialize/css/materialize.min.css">  
    <link rel="stylesheet" href="./lib/font-awesome/font-awesome.min.css"> 
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dashboard.css">       
    <script src='./lib/jquery/jquery.js'></script> 
    <script src="./js/cookie.js"></script> 
    <!------------script for loader ----------------->  
    <script src="./js/loader.js"></script>
</head>
<body>  
<!------------  loader   ------------>   
 <div class="spinner"></div>  

<!----------------- notifications ---------->
<div class="notify" style="display: none"> 
<h4 class="msg center left"></h4>
<i class="fa fa-remove remove fa-2x right" onclick="notify('none')"> 
</i>
</div> 
 <nav class="nav-wrapper">  
  <div class="sidenav-trigger right">  
     <a href="./" class="nav-content">home</a>  
      <a href="https://github.com/bethropolis/url-shortener" class="nav-content" title="star me on github"><i class="fa fa-github fa-2x"></i></a>  
  </div>     
 </nav> 
  
  <!----- the pop up cover ------->
 <div class="add" style="display: none"> 
  <i class="fa fa-remove remove fa-2x" onclick="add('none')"></i>   
</div> 

<div class="row col">  

<div class="col s1 test blue accent-3 sidenavigator"> 
<ul>
    <i class="fa fa-plus fa-2x" onclick="add('flex','_add')"></i>  
</ul>
<ul>
    <i class="fa fa-link fa-2x" onclick="add('block','_url')"></i>
</ul> 
<ul>
    <i class="fa fa-cog fa-2x" onclick="notify('flex','feature still to be added')"></i> 
</ul>
<ul> 
   <!-------- oh, God forgive me for this!---------->
     <a href="https://bethropolis.ga" title="visit my website"><i class="fa fa-heart fa-2x"></i></a> 
</ul>
</div> 

  

<div class="col s11 test"> 
 <!------------------ link summary----------------------->
<div class="card red link-info hoverable  z-depth-1">
  <div class="grid-el blue g1"></div>
 <div class="grid-el yellow g2">
    <h5>total links<h5>
       <div class="v2">
          <div class="spin"></div>
       <div class="links_num"></div>      
     </div>
    </div>
  <div class="grid-el black-text green g3">
    <h5>total visits<h5>
       <div class="v2">
          <div class="spin"></div>
       <div class="links_num"></div>
       </div>
  </div>
</div>
 




<!---------- display urls------------------->
<div class="urls" style="display:none; top:0;"></div>   

</div>
</div>
<script src="./js/dashboard.js"></script>  
</body>
</html>