<?php
session_start();
include 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>Products Page</title>
         
    </head>
    <body id="background1">
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
            <br> <br>
            <form method = "GET" id="forms">
            <b> Movie: </b><input type="text" name="MovieName" placeholder="name or description" /> <br />
            <br>
            <b> Genre:</b> 
            <select name="genre">
               <option value=" "> Select one </option> 
               <?php 
               categoryDisplayMovie();
               categoryDisplayGame();
               ?>
            
            </select>
            <br><br>
            <b>Price:  From: </b> <input type="text" name="priceFrom" size="6"/> 
            <b> To: </b> <input type="text" name="priceTo" size="6"/>
            <br>
            <b>Low to High Price</b> <input type="radio" name="orderBy" value="LToH" >
            <b>High to Low Price</b><input type="radio" name="orderBy" value="HToL" ><br>
            <b>Alphabetical Order </b><input type="radio" name="orderBy" value="alphabetic">
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" id="b1" />
        </form>
    </body>
</html>
