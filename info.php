<?php
session_start();
//include 'inc/dbConnection.php';
//$dbConn = startConnection("project2");
include 'functions.php';

echo $_POST['itemId'];
if (isset($_GET['itemId'])) {

  $itemInfo = showInfo($_GET['itemId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
                <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <title> Product Info </title>
    </head>
    <body id = 'info_body'>
    
    <h3><?=$itemInfo['name']?></h3>
     <?=$itemInfo['description']?><br>
     <img src='<?=$itemInfo['image']?>' height='200'/>
 
    </body>
</html>