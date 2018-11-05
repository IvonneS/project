<?php
include 'inc/dbConnection.php';
$dbConn = startConnection("project2");//put in parentesis database Name

function displayGenre(){
    global $dbConn;
    
    $sql = "SELECT * FROM  ORDER BY ";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='".$record['']."'>" . $record[''] . "</option>";
    }
}
function displaySeachResults(){
        
        global $dbConn;
        
        if(isset($_GET['searchForm'])){
            
            echo "<h3>Moives Found: </h3>";
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM  WHERE 1"; //ADD DATABASE NAME
            
            //Check input fields
            if(!empty($_GET['MovieName'])){
                $sql .= " AND productName OR productDescription LIKE :MovieName"; //CHANGE SQL SEARCH VALUES
                $namedParameters[':MovieName'] = "%" .$_GET['MovieName']. "%";
            }
            
            if(!empty($_GET['genre'])){
                $sql .= " AND catId = :genre"; //CHANGE SQL SEARCH VALUES
                $namedParameters[':genre'] = $_GET['genre'];
            }
            
            if(!empty($_GET['priceFrom']) && !empty($_GET['priceTo'])){
                $sql .= " AND price >= :priceFrom"; //CHANGE SQL SEARCH VALUES
                $sql .= " AND price <= :priceTo"; //CHANGE SQL SEARCH VALUES
                $namedParameters[':priceFrom'] = $_GET['priceFrom'];
                $namedParameters[':priceTo'] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy'] == 'price'){
                    $sql .= " ORDER BY price"; //CHANGE SQL SEARCH VALUES
                }
                else{
                    $sql .= " ORDER BY productName"; //CHANGE SQL SEARCH VALUES
                }
            }
            
            $stmt = $db->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //Output results
            echo "<table class='table'>";
            foreach($records as $record){
            
            //CHECK DB VALUES
            $movieName = $record['MovieName'];
            $genre = $record['genre'];
            $itemImage = $record['thumbnailImage'];
            
            
            //CHANGE VALUES TO CURRENT DB
            echo "<tr>";
            echo "<td><img src='$itemImage'></td>";
            echo "<td><h4>$itemName</h4></td>";
            echo "<td><h4>$itemPrice</h4></td>";
            
            //UPDATE VARIABLES TO 
            echo "<forum method='post'>";
            echo "<input type='hidden' name='itemName' value='$itemName'>";
            echo "<td><button class='btn btn-warning'>Add</button></td>";
            echo "</forum>";
            
            echo "<tr>";
            
            echo "<forum method='post'>";
            echo "<input type='hidden' name='itemName' value'$itemName'>";
            echo "<input type='hidden' name='itemId' value'$itemId'>";
            echo "<input type='hidden' name='itemImage' value'$itemImage'>";
            echo "<input type='hidden' name='itemPrice' value'$itemPrice'>";
            
            echo "<td><button class='btn btn-warning'>ADD</button></td>";
            echo "</forum>";
            
        }
        echo "</table>";
        }
    }
    
    function categoryDisplayMovie() {
        global $dbConn;
        
       $sql = "SELECT DISTINCT genre FROM movies ORDER BY genre ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
           echo "<option value = 'Movies: ".$record['genre']."'> Movies: " .$record["genre"] ."</option>";
        }
    }
    
    function categoryDisplayGame() {
          global $dbConn;
        
       $sql = "SELECT DISTINCT genre FROM video_games ORDER BY genre ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
           echo "<option value = 'Video Games: ".$record['genre']."'> Video Games: " .$record["genre"] ."</option>";
        }
    }
    
    function categoryExplain() {
        global $dbConn;
        
       $sql = "SELECT DISTINCT name FROM Genre ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
           echo "<option value = 'Explanation: ".$record['name']."'> Explanation: " .$record["name"] ."</option>";
        }
    }
    


    function findMatches() {
        global $dbConn;
        $sql = "";
       // if($_GET["genre"] == "Explanation") {
                        //code found from https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working/21229246

         //echo "<script type='text/javascript'> document.location = 'explanation.php'; </script>";
         //break;
        
        if($_GET['genre'] == "Movies: action"){
            $sql = "SELECT * FROM movies where name LIKE '%" . $_GET['MovieName'] . "%' AND genre = 'action'";
        }
        if($sql != ""){
            echo "IN HERE!!!!";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
        echo $record["name"];
        echo "<br>";
        }
        }
    }
    
    function explain() {
        global $dbConn;

        $sql = "SELECT description FROM `Genre` ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
           echo "<h1> " . $record['description'] ." </h1>";
        }
    }
    

    

?>