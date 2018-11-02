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
    <body>
            <ul>
                <li><a class="active" href="#home">Home</a></li>
                <li><a href="#cart">Cart</a></li>
            </ul>
            <br> <br>
            <form method = "GET" id="forms">
              Movie: <input type="text" name="MovieName" placeholder="name or description" /> <br />
            <br>
            Genre: 
            <select name="genre">
               <option value=" "> Select one </option> 
            
            </select>
            <br><br>
            Price:  From: <input type="text" name="priceFrom" size="6"/> 
             To: <input type="text" name="priceTo" size="6"/>
            <br>
            Low to High Price <input type="radio" name="orderBy" value="LToH" >
            High to Low Price<input type="radio" name="orderBy" value="HToL" ><br>
            Alphabetical Order <input type="radio" name="orderBy" value="alphabetic">
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" id="b1" />
        </form>
    </body>
</html>
