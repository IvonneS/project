<?php
session_start();
include 'functions.php';
include '../cst336/inc/dbConnection.php';
$dbConn = startConnection("");//put in parentesis database Name

    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    

?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
        
        <h1>WELCOME</h1>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       <div>
            <ul class='bar'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='cart.php'>
            </ul>
        </div>    
            <form method = "GET">
              Product: <input type="text" name="productName" placeholder="Product keyword" /> <br />
            <br>
            Category: 
            <select name="category">
               <option value=" "> Select one </option>  
            </select>
            <br><br>
            Price:  From: <input type="text" name="priceFrom" size="6"/> 
             To: <input type="text" name="priceTo" size="6"/>
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" />
        </form>
    </body>
</html>