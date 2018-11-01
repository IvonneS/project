<?php
include 'functions.php';
    if(isset($_GET['query'])){
        //Get access to API HERE
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
        <form method = "GET">
              Product: <input type="text" name="productName" placeholder="Product keyword" /> <br />
            <br>
            Category: 
            <select name="category">
               <option value=" "> Select one </option>  
            </select>
            <br><br>
            Price: From: <input type="text" name="priceFrom" size="6"/> 
             To: <input type="text" name="priceTo" size="6"/>
            <br><br>
            <input type="submit" name="searchForm" value="Search" />
        </form>
    </body>
</html>