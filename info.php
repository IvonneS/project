<?php
session_start();

//include 'inc/dbConnection.php';
//$dbConn = startConnection("project2");
include 'functions.php';
//validateSession();

if (isset($_GET['itemId'])) {

  $itemInfo = showInfo($_GET['itemId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
    
    <h3><?=$itemInfo['name']?></h3>
     <?=$itemInfo['description']?><br>
     <img src='<?=$itemInfo['image']?>' height='75'/>
 
    </body>
</html>