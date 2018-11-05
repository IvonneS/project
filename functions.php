<?php
include 'inc/dbConnection.php';
$dbConn = startConnection("project2");

function displayGenre(){
    global $dbConn;
    
    $sql = "SELECT * FROM Genre ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='".$record['name']."'>" . $record['name'] . "</option>";
    }
}

function displaySeachResults(){
        
        global $dbConn;

        if(isset($_GET['searchForm'])){
            
            if($_GET['searchFor'] == 'movies'){
            
                echo "<h3>Movies Found: </h3>";
                
                $namedParameters = array();
                
                $sql = "SELECT * FROM movies WHERE 1"; 
                
                //Check input fields
                if(!empty($_GET['MovieName'])){
                    $sql .= " AND name OR description LIKE :MovieName";
                    $namedParameters[':MovieName'] = "%" .$_GET['MovieName']. "%";
                }
                
                if(!empty($_GET['genre'])){
                    $sql .= " AND genre = :genre"; 
                    $namedParameters[':genre'] = $_GET['genre'];
                }
                
                if(!empty($_GET['priceFrom']) && !empty($_GET['priceTo'])){
                    $sql .= " AND price >= :priceFrom"; 
                    $sql .= " AND price <= :priceTo"; 
                    $namedParameters[':priceFrom'] = $_GET['priceFrom'];
                    $namedParameters[':priceTo'] = $_GET['priceTo'];
                }
                
                if(isset($_GET['orderBy'])){
                    if($_GET['orderBy'] == 'alphabetic'){
                        $sql .= " ORDER BY name"; 
                    }
                    elseif($_GET['orderBy'] == 'LToH') {
                        $sql .= " ORDER BY price DESC"; 
                    }
                    elseif($_GET['orderBy'] == 'HToL'){
                        $sql .= " ORDER BY price";
                    }
                }
                
                $stmt = $dbConn->prepare($sql);
                $stmt->execute($namedParameters);
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            elseif($_GET['searchFor'] == 'video_games'){
                
                echo "<h3>Video Games Found: </h3>";
                
                $namedParameters = array();
                
                $sql = "SELECT * FROM video_games WHERE 1"; 
                
                //Check input fields
                if(!empty($_GET['MovieName'])){
                    $sql .= " AND name OR description LIKE :MovieName";
                    $namedParameters[':MovieName'] = "%" .$_GET['MovieName']. "%";
                }
                
                if(!empty($_GET['genre'])){
                    $sql .= " AND genre = :genre"; 
                    $namedParameters[':genre'] = $_GET['genre'];
                }
                
                if(!empty($_GET['priceFrom']) && !empty($_GET['priceTo'])){
                    $sql .= " AND price >= :priceFrom"; 
                    $sql .= " AND price <= :priceTo"; 
                    $namedParameters[':priceFrom'] = $_GET['priceFrom'];
                    $namedParameters[':priceTo'] = $_GET['priceTo'];
                }
                
                if(isset($_GET['orderBy'])){
                    if($_GET['orderBy'] == 'alphabetic'){
                        $sql .= " ORDER BY name"; 
                    }
                    elseif($_GET['orderBy'] == 'LToH') {
                        $sql .= " ORDER BY price ASC"; 
                    }
                    elseif($_GET['orderBy'] == 'HToL'){
                        $sql .= " ORDER BY price DESC";
                    }
                }
                
                $stmt = $dbConn->prepare($sql);
                $stmt->execute($namedParameters);
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            }
            
            if(isset($_GET['searchFor'])){
                //Output results
                echo "<table class='table'>";
                foreach($records as $record){
                
                    //Assign values to variables
                    $movieName = $record['name'];
                    $genre = $record['genre'];
                    $itemImage = $record['image'];
                    $itemPrice = $record['price'];
                    
                    
                    //Display Items
                    echo "<tr>";
                    echo "<td><img src='$itemImage'></td>";
                    echo "<td><h4>$itemName</h4></td>";
                    echo "<td><h4>$itemPrice</h4></td>";
                    
                    //Button to add to cart
                    echo "<forum method='post'>";
                    echo "<input type='hidden' name='itemName' value='$itemName'>";
                    echo "<input type='hidden' name='itemImage' value='$itemImage'>";
                    echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";
                    echo "<td><button class='btn btn-warning'>ADD</button></td>";
                    echo "</forum>";
                    echo "</tr>";
                }
            }
            
        echo "</table>";
        }
    }
    
    function explain() {
        global $dbConn;

        $sql = "SELECT description FROM `Genre` ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table id = 'explanation_table'>";
        $i = 0;
        echo "<tr id = 'explanation_tr'>";
        foreach($records as $record){
            echo "<th id = 'explanation_th'>";
        echo $record['description'];
        $i++;
        if($i == 2){
            $i =0;
            echo "<tr>";
        }
         // echo "<h1> " . $record['description'] ." </h1>";
        }
        echo "</table>";
    }

    

    

?>