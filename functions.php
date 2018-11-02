<?php
include '../cst336/inc/dbConnection.php';
$dbConn = startConnection("");//put in parentesis database Name
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

?>