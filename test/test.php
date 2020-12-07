<!-----------
Test if POST REQUEST and GET REQUEST works
----------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>url shortener test</title>

</head>
<body>
   <form action="../inc/data.inc.php" method="POST">
   <input type="text" name="id" placeholder="user...">
   <input type="text" name="url"  placeholder="url....">
   <input type="text" name="slug" placeholder="slug....">
   <input type="submit" value="TEST IT"> 
   </form>

<!---------- display url------------------->
<div class="urls" style="display:none;"></div> 
<script src="./js/index.js">
</body>
</html>