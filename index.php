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
                <li><a href = "explanation.php">Explanation</a></li>
            </ul>
            <br> <br>
            <form method = "GET" id="forms">
            <b> Movie Or Video Game: </b><input type="text" name="MovieName" placeholder="name" /> <br />
            <br>
            <b>Movies</b> <input type="radio" name="searchFor" value="movies" >
            <b>Video Games</b><input type="radio" name="searchFor" value="video_games" ><br>
            <br>
            <b> Genre:</b> 
            <select name="genre">
               <option value=" "> Select one </option> 
               <?php
            //   categoryDisplayMovie();
            //   categoryDisplayGame();
               displayGenre();
               ?>
            </select>
            <br><br>
            <b>Price:  From: </b> <input type="number" name="priceFrom" size="6"/> 
            <b> To: </b> <input type="number" name="priceTo" size="6"/>
            <br>
            <b>Low to High Price</b> <input type="radio" name="orderBy" value="LToH" >
            <b>High to Low Price</b><input type="radio" name="orderBy" value="HToL" ><br>
            <b>Alphabetical Order </b><input type="radio" name="orderBy" value="alphabetic">
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" id="b1" />
        </form>
        <?php
            if(isset($_GET['searchForm'])){
                echo "<hr>";
                echo "<div id='output'>";
                displaySeachResults();
                echo "</div>";
            }
        ?>

    </body>
</html>


