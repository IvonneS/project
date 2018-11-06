<?php
include 'inc/dbConnection.php';
$dbConn = startConnection("project2");

function displayCart(){
    if(isset($_SESSION['cart'])){
        echo "<table id='out_table' align='center'>";
         echo "<tr>";
                echo "<th> Poster</th>";
                echo "<th> Title </th>";
                echo "<th> Genre </th>";
                echo "<th> Price </th>";
                echo "<th> Quantity </th>";
                echo "</tr>";
             
        foreach($_SESSION['cart'] as $item){
            $itemId= $item['id'];
            $itemName = $item['name'];
            $itemGenre = $item['genre'];
            $itemImage = $item['img'];
            $itemPrice = $item['price'];
            echo '<tr>';
            //Display data for item
            echo "<td><img src='" . $itemImage. "'></td>";
            echo "<td><h4>". $itemName."</h4></td>";
            echo "<td><h4>" . $itemGenre . "</h4></td>";
            echo "<td><h4>$" . $itemPrice . "</h4></td>";
            echo "</tr>";
        }
        echo "</table>";
 }
}

foreach($records as $record){
                
                    //Assign values to variables
                    $itemName = $record['name'];
                    $genre = $record['genre'];
                    $itemImage = $record['image'];
                    $itemPrice = $record['price'];

                    
                    //Display Items
                    echo "<tr>";
                    echo "<td><img src='$itemImage'></td>";
                    echo "<td><h4>$itemName</h4></td>";
                    echo "<td><h4> $genre </h4></td>";
                    echo "<td><h4>$itemPrice</h4></td>";
                    
foreach($records as $record){
                
                    //Assign values to variables
                    $itemName = $record['name'];
                    $genre = $record['genre'];
                    $itemImage = $record['image'];
                    $itemPrice = $record['price'];

                    
                    //Display Items
                    echo "<tr>";
                    echo "<td><img src='$itemImage'></td>";
                    echo "<td><h4>$itemName</h4></td>";
                    echo "<td><h4> $genre </h4></td>";
                    echo "<td><h4>$itemPrice</h4></td>";
                    
//**************************************************************************************************************************
function displayGenre(){
    global $dbConn;
    
    $sql = "SELECT * FROM Genre ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='" .$record['name']. "'";
        
        if($_GET['genre'] == $record['name']){
            echo "selected = 'selected'";
        }
        echo ">" .$record['name']. "</option><br />";
    }
}
//*****************************************************************************************************************************
function checkInputs(){
    
    $flag = true;
    
    //Ensure that at least one field is filled
    if(($_GET['MovieName'] == "") &&
       (!isset($_GET['searchFor'])) &&
       ($_GET['priceFrom'] == "" && $_GET['priceTo'] == "" ) &&
       ($_GET['genre'] == "")){
           
           echo "<h2> ERROR: Please select search criteria </h2>";
           $flag = false;
       }
      
     //Ensure that price values are correct  
    if(($_GET['priceFrom'] > $_GET['priceTo']) || ($_GET['priceTo'] < $_GET['priceFrom'])){
        
        echo "<h2> ERROR: Invalid price range </h2>";
        $flag = false;
    } 
    
    return $flag;
}
//*****************************************************************************************************************************
function displaySeachResults(){
        
        global $dbConn;

        if(isset($_GET['searchForm'])){
            
            if($_GET['searchFor'] == 'movies'){
            
                echo "<h3>Moives Found: </h3>";
                
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
                echo "<table id='out_table' align='center'>";
                echo "<tr>";
                echo "<th> Poster</th>";
                echo "<th> Title </th>";
                echo "<th> Genre </th>";
                echo "<th> Price </th>";
                echo "<th> Add to Cart </th>";
                echo "</tr>";
                foreach($records as $record){
                
                    //Assign values to variables
                    $itemName = $record['name'];
                    $genre = $record['genre'];
                    $itemImage = $record['image'];
                    $itemPrice = $record['price'];

                    
                    //Display Items
                    echo "<tr>";
                    echo "<td><img src='$itemImage'></td>";
                    echo "<td><h4>$itemName</h4></td>";
                    echo "<td><h4> $genre </h4></td>";
                    echo "<td><h4>$itemPrice</h4></td>";
                    
                    //Add item to cart 
                    echo "<forum method='post'>";
                    echo "<input type='hidden' name='itemName' value='$itemName'>";
                    echo "<td><button id='b2'>Add</button></td>";
                    echo "</forum>";
                    
                    echo "</tr>";

                }
            }
            
        echo "</table>";
        }
    }
//**************************************************************************************************************************    
    function explain() {
        global $dbConn;

        $sql = "SELECT * FROM `Genre` ORDER BY name ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table id='out_table' align='center'>";
        echo "<tr>";
        echo "<th> Genre </th>";
        echo "<th> Description  </th>";
        echo "</tr>";
        foreach($records as $record){
        
            echo "<tr>";    
            echo "<td> " .$record['name']. " </td>";
            echo "<td> " .$record['description']. " </td>";
            echo "</tr>";
        }
    }

?>

