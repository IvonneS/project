<?php
session_start();
include 'functions.php';
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
                        <li><a href='cart.php'>Cart</a></li>
            </ul>
        </div>    
            <form method = "GET">
              Name: <input type="text" name="MovieName" placeholder="Movie name or description" /> <br />
            <br>
            Genre: 
            <select name="genre">
               <option value=" "> Select one </option> 
               <?=displayGenre()?>
            </select>
            <br><br>
            Price:  From: <input type="text" name="priceFrom" size="6"/> 
             To: <input type="text" name="priceTo" size="6"/>
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" />
        </form>
    </body>
</html>