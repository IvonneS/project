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
                
                <!--<span class='glyphicon glyphicon-shooping-cart' aria-hidden='true'>-->
                <li><a href="cart.php">Cart</a></li>
                <li><a href = "explanation.php">Explanation</a></li>
            </ul>
            <br> <br>
            <form method = "GET" id="forms">
            <b> Movie Or Video Game: </b><input type="text" name="MovieName" placeholder="name" value = '<?php echo ($_GET['MovieName']) ?  $_GET['MovieName']  : ''; ?>'/> <br />
            <br>
            <b>Movies</b> <input type="radio" name="searchFor" value="movies" <?php echo ($_GET['searchFor'] == 'movies') ? 'checked="checked"' : ''; ?>>
            <b>Video Games</b><input type="radio" name="searchFor" value="video_games" <?php echo ($_GET['searchFor'] == 'video_games') ? 'checked="checked"' : ''; ?>><br>
            <br>
            <b> Genre:</b> 
            <select name="genre">
               <option value=""> Select one </option> 
               <?= displayGenre(); ?>
            </select>
            <br><br>
            <b>Price:  From: </b> <input type="number" name="priceFrom" size="6" value = '<?php echo ($_GET['priceFrom']) ?  $_GET['priceFrom']  : ''; ?>'/> 
            <b> To: </b> <input type="number" name="priceTo" size="6" value = '<?php echo ($_GET['priceTo']) ?  $_GET['priceTo']  : ''; ?>'/>
            <br>
            <b>Low to High Price</b> <input  type="radio"  name="orderBy" value="LToH" <?php echo ($_GET['orderBy'] == 'LToH') ? 'checked="checked"' : ''; ?>>
            <b>High to Low Price</b><input   type="radio"   name="orderBy" value="HToL" <?php echo ($_GET['orderBy'] == 'HToL') ? 'checked="checked"' : ''; ?>><br>
            <b>Alphabetical Order </b><input type="radio" name="orderBy" value="alphabetic" <?php echo ($_GET['orderBy'] == 'alphabetic') ? 'checked="checked"' : ''; ?>>
            <br><br>
            <input type="submit" name="searchForm" value="SEARCH" id="b1" />
        </form>
        <?php
            if(isset($_GET['searchForm'])){
                echo "<div id='output'>";
                displaySeachResults();
                echo "</div>";
            }
        ?>

    </body>
</html>
